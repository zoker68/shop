<?php

namespace Zoker68\Shop\View\Components\Partials;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Zoker68\Shop\Models\Category;

class Navbar extends Component
{
    public function render(): View
    {
        return view('zoker68.shop::components.partials.navbar', ['categories' => Category::getAllNested()]);
    }
}
