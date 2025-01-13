<?php

namespace Zoker\Shop\View\Components\Partials\Mobile;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Zoker\FilamentStaticPages\Models\Menu as MenuModel;

class Menu extends Component
{
    public MenuModel $menu;

    public function render(): View
    {
        $this->menu = MenuModel::getMenu('mobile');

        return view('shop::components.partials.mobile.menu');
    }
}
