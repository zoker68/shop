@props([
    'category'
])

<div class="border border-[#EDECEC] hover:shadow-lg rounded-md overflow-hidden transition duration-300">
    <a href="{{ route('category', $category) }}">
        <div class="p-7 group text-center">
            <div
                class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden group-hover:scale-110 transition-all duration-300">
                <img src="{{ $category->getCover(100, 100) }}" class="w-[90px] h-[90px] object-contain rounded-full" alt="{{ $category->name }}">
            </div>
            <h5
                class="mt-7 text-md leading-tight font-semibold group-hover:text-secondary transition duration-300">
                {{ $category->name }}</h5>
        </div>
    </a>
</div>
