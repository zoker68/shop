<x-layouts.mail>
    <x-slot:header>{{ __('product.questions.new.mail.header', ['config' => config('app.name')]) }}</x-slot:header>

    <p class="pt-3">{{ __('product.questions.new.mail.product') }} <strong>{{ $product->name }}</strong></p>

    <p class="pt-5">{{ __('product.questions.new.mail.question', ['config' => config('app.name')]) }} <strong>{{ $question->question }}</strong></p>

    <p class="pt-3">{{ __('product.questions.new.mail.before_link') }}</p>
    <p style="text-align: center;">
        <a href="{{ $link }}" class="btn">{{ __('product.questions.new.mail.link') }}</a>
    </p>
</x-layouts.mail>
