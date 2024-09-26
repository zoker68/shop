<?php

namespace Zoker\Shop\View\Components\Widgets;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Models\Product;

class Tops extends Component
{
    public function __construct(protected string $code) {}

    public function render(): ?View
    {
        $categoryIds = config('shop.widgets.tops.' . $this->code . '.categories');
        if (! $categoryIds) {
            return null;
        }

        $topRanking = cache()->remember(
            'top_' . $this->code . '_products',
            now()->addHour(),
            fn () => $this->getTopProducts($categoryIds)
        );

        return view('shop::components.widgets.tops.default', compact('topRanking'));
    }

    private function getTopProducts(array $categoryIds): array
    {
        return Category::findMany($categoryIds)
            ->map(function (Category $category) {
                return [
                    'category' => $category,
                    'products' => Product::query()
                        ->forCategory($category)
                        ->published()
                        ->withAvg('reviews', 'rating')
                        ->withCount('reviews')
                        ->take(config('shop.widgets.tops.ranking.limit', 3))
                        ->applySorting(config('shop.widgets.tops.ranking.sort'))
                        ->get(),
                ];
            })
            ->toArray();
    }
}
