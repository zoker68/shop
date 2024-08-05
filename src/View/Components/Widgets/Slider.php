<?php

namespace Zoker\Shop\View\Components\Widgets;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Zoker\Shop\Models\WidgetSlide;

class Slider extends Component
{
    public function __construct(public string $code) {}

    public function render(): View
    {
        $slides = WidgetSlide::getSlider($this->code);

        return view('shop::components.widgets.slider', compact('slides'));
    }
}
