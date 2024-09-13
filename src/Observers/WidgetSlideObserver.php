<?php

namespace Zoker\Shop\Observers;

use Zoker\Shop\Models\WidgetSlide;

class WidgetSlideObserver
{
    public function saved(WidgetSlide $slide): void
    {
        cache()->forget($slide->getCacheKey());
    }

    public function deleted(WidgetSlide $slide): void
    {
        cache()->forget($slide->getCacheKey());
    }
}
