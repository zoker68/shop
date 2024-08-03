<?php

namespace Zoker\Shop\View\Components\Partials;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    protected array $breadcrumbs = [];

    public function __construct(array|string $data = '')
    {
        if (empty($data)) {
            return;
        }

        $this->breadcrumbs[] = [
            'title' => __('zoker.shop::layout.breadcrumbs.index'),
            'url' => route('index'),
        ];

        if (is_string($data)) {
            $data = [['title' => $data]];
        }

        $this->breadcrumbs = array_merge($this->breadcrumbs, $data);
    }

    public function render(): ?View
    {
        if (request()->routeIs('index')) {
            return null;
        }

        return view('zoker.shop::components.partials.breadcrumbs', ['breadcrumbs' => $this->getBreadcrumbs()]);
    }

    public function getBreadcrumbs(): array
    {
        return $this->breadcrumbs;
    }
}
