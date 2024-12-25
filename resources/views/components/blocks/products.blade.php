<div class="container pb-14">
    <div class="flex items-start justify-between mb-[30px]">
        <h2 class="text-[22px] sm:text-[32px] font-medium text-secondary">{{ $heading }}</h2>
        <div class="pt-2">
            <a href="{{ $link['url'] }}" target="{{ $link['target'] }}" class="text-[15px] font-medium text-primary flex items-center gap-1">{{ $link['text'] }}
                <svg width="15" height="15" viewBox="0 0 32 32">
                    <path fill="currentColor"
                          d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z">
                    </path>
                </svg>
            </a>
        </div>
    </div>
    <livewire:shop.products-block :data="$settings" />
</div>
