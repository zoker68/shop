<?php

namespace Zoker\Shop\View\Components\Partials;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Zoker\Shop\Models\Category;

class Navbar extends Component
{
    public function render(): View
    {
        return view('zoker.shop::components.partials.navbar', ['categories' => Category::getAllNested()]);
    }
}
