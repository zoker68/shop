<!-- CATEGORIES -->
<div class="container pb-14">
    <h2 class="text-[28px] mb-6 text-secondary">{{ $heading }}</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-6 gap-6">
        @foreach($categories as $category)
            <x-shop::partials.categories.card-small :category="$category"/>
        @endforeach
    </div>
</div>
<!-- CATEGORIES end-->
