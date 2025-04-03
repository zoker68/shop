@props([
    'category'
])

<div class="col-span-1 overflow-hidden rounded-md">
    <a href="{{ route('category', $category) }}"
       class="group h-[150px] sm:h-[250px] flex items-center justify-center relative bg-cover bg-no-repeat bg-center after:absolute after:inset-0 after:bg-[#00000060] after:content-['']"
       style="background-image: url({{ $category->getCover(400, 250) }});">
        <div class="flex items-center relative z-10">
            <h4 class="text-xl leading-6 text-white font-medium">{{ $category->name }}</h4>
            <div
                class="text-white opacity-0 group-hover:opacity-100 group-hover:ml-2 transition-all duration-300">
                <svg width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M13.3 17.275q-.3-.3-.288-.725q.013-.425.313-.725L16.15 13H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.15L13.3 8.15q-.3-.3-.3-.713q0-.412.3-.712t.713-.3q.412 0 .712.3L19.3 11.3q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.687.275q-.413 0-.713-.3Z" />
                </svg>
            </div>
        </div>
    </a>
</div>
