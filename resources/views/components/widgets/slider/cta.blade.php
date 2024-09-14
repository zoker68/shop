<div {{ $attributes->class(['container pb-14']) }}>
    <div class="sm:flex flex-wrap">
        @foreach($slides as $slide)
        <div class="w-full sm:w-1/{{ count($slides) }} p-1">
            <div
                class="flex flex-col-reverse lg:flex-row gap-4 lg:gap-0 lg:items-center justify-between px-8 py-6 bg-[#EDECEC]">
                <div>
                    <h3 class="text-lg leading-4 mb-2 text-primary">{{ $slide['heading'] }}</h3>
                    <div>{!! $slide['text'] !!}</div>
                    <a href="{{ $slide['link'] }}" target="{{ $slide['target'] }}"  class="primary-btn min-w-[80px] mt-3">{{ $slide['button'] }}</a>
                </div>
                <div class="flex justify-center">
                    <img src="{{ Croppa::url(asset('storage/'.$slide['image']), 200) }}"
                         class="w-[200px] h-[150px] lg:h-[180px] object-contain flex-shrink-0 hover:scale-105 transition-all duration-300"
                         alt="product">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
