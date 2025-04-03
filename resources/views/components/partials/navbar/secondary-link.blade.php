@props([
    'category'
])

<div class="mb-3 pl-2 pt-1 border-l border-[#E9E4E4]">
    <h4 class="xl:text-md uppercase leading-[21px] mb-2.5 font-semibold text-secondary hover:text-black transition duration-300"><a href="{{ route('category', $category) }}">{{ $category->name }}</a></h4>
    @if($category->children->count())
    <div class="">
    @foreach($category->children as $child)
        <x-shop::partials.navbar.third-link :category="$child"/>
   @endforeach
    </div>
    @endif
</div>
