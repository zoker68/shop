@props([
    'category'
])

<div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
    <a href="{{ route('category', $category) }}" class="w-full flex justify-center">
        <div class="p-4 group text-center">
            <div
                class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                <img src="{{ $category->getCover(90, 90) }}" class="w-[90px] h-[90px] object-contain rounded-full" alt="{{ $category->name }}">
            </div>
            <h5
                class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                {{ $category->name }}</h5>
        </div>
    </a>
</div>
