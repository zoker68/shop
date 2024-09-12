<?php

namespace Zoker\Shop\View\Components\Widgets;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Zoker\Shop\Models\WidgetSlide;

class Slider extends Component
{
    public function __construct(public string $code, public string $type = 'slider') {}

    public function render(): View
    {
        $slides = WidgetSlide::getSlider($this->code);

        return view($this->getTemplate(), compact('slides'));
    }

    public function getTemplate(): string
    {
        return match ($this->type) {
            'block' => 'shop::components.widgets.slider.block',
            default => 'shop::components.widgets.slider.default',
        };
    }
}
