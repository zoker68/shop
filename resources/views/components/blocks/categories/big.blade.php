<!-- categories -->
<div class="container pb-14">
    <h2 class="text-[28px] text-secondary mb-6">{{ $heading }}</h2>
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-2">
        @foreach($categories as $category)
            <x-shop::partials.categories.card-big :category="$category"/>
        @endforeach
    </div>
</div>
<!-- categories end-->
