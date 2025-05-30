<?php

namespace Zoker\Shop\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Zoker\Shop\Mail\QuestionAdded;
use Zoker\Shop\Mail\ReviewAdded;
use Zoker\Shop\Models\Product as ProductModel;
use Zoker\Shop\Models\ProductQuestion;
use Zoker\Shop\Models\ProductReview;
use Zoker\Shop\Traits\Livewire\Alertable;
use Zoker\Shop\Traits\Livewire\HasCartFunctions;
use Zoker\Shop\Traits\Livewire\HasWishlistFunctions;

class Product extends Component
{
    use Alertable, HasCartFunctions, HasWishlistFunctions;

    public ProductModel $product;

    /**
     * @var Collection<ProductQuestion>
     */
    public Collection $questions;

    /**
     * @var Collection<ProductReview>
     */
    public Collection $reviews;

    public Collection $ratings;

    #[Validate('required|string|min:5|max:1000')]
    public string $question = '';

    #[Validate('required|int|between:1,5')]
    public int $rating = 0;

    #[Validate('nullable|string|min:5|max:1000')]
    public string $review = '';

    protected function getMessages(): array
    {
        return [
            'question.required' => __('shop::product.questions.errors.required'),
            'question.min' => __('shop::product.questions.errors.min'),
            'question.max' => __('shop::product.questions.errors.max'),

            'rating.required' => __('shop::product.reviews.errors.rating.required'),
            'rating.between' => __('shop::product.reviews.errors.rating.between'),

            'review.min' => __('shop::product.reviews.errors.review.min'),
            'review.max' => __('shop::product.reviews.errors.review.max'),
        ];
    }

    public function mount(): void
    {
        $this->product->load('properties');

        $this->loadWishlist();
    }

    public function render(): View
    {
        $this->questions = $this->product->questions()->with('user')->published()->latest()->get();
        $this->ratings = $this->product->reviews()->with('user')->published()->latest()->get();
        $this->reviews = $this->ratings->whereNotNull('review');

        $this->dispatch('initProductSlider');

        return view('shop::livewire.shop.product');
    }

    public function newQuestion(): void
    {
        if (! auth()->check()) {
            $this->throwAlert('warning', __('shop::product.questions.errors.must_login'), 5);

            return;
        }

        $data = $this->validateOnly('question');
        $data['user_id'] = auth()->id();

        $question = $this->product->questions()->create($data);

        $this->throwAlert('success', __('shop::product.questions.new.success'), 5);

        $this->question = '';

        Mail::to(config('shop.mail_recipients.reviews'))->queue(new QuestionAdded($this->product, $question));
    }

    public function newReview(): void
    {
        if (! auth()->check()) {
            $this->throwAlert('warning', __('shop::product.reviews.errors.must_login'), 5);

            return;
        }

        $update['rating'] = $this->validateOnly('rating')['rating'];
        $update['review'] = $this->validateOnly('review')['review'] ?? null;

        if (empty($update['review'])) {
            unset($update['review']);
        } else {
            $update['published'] = false;
        }

        $review = $this->product->reviews()->updateOrCreate(['user_id' => auth()->id()], $update);

        $this->throwAlert('success', __('shop::product.reviews.new.success'), 5);

        $this->review = '';

        if ($review->review) {
            Mail::to(config('shop.mail_recipients.reviews'))->queue(new ReviewAdded($this->product, $review));
        }
    }
}
