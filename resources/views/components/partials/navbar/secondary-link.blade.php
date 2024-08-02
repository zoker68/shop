@props([
    'category'
])

<div class="mb-5">
    <h4 class="xl:text-lg leading-[21px] mb-2.5 font-medium hover:text-primary transition duration-300"><a href="{{ route('category', $category) }}">{{ $category->name }}</a></h4>
    @if($category->children->count())
    <div class="">
    @foreach($category->children as $child)
        <x-partials.navbar.third-link :category="$child"/>
   @endforeach
    </div>
    @endif
</div>
