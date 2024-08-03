<?php

namespace Zoker\Shop\Http\Controllers;

use Illuminate\View\View;
use Zoker\Shop\Enums\ProductsSorting;
use Zoker\Shop\Enums\ViewType;
use Zoker\Shop\Models\Category;

class CategoryController extends Controller
{
    public function __invoke(Category $category): View
    {
        if (! $category->id) {
            $category = Category::getAllCached()->firstWhere('id', 1);
        }

        abort_if(! $category->published, 404);

        $viewType = ViewType::getType()->value;

        $sortOptions = ProductsSorting::getOptions();

        return view('shop::pages.category', compact('category', 'viewType', 'sortOptions'));
    }

    public function getViewType(): string
    {
        return cache()->rememberForever('viewType', function () {
            return 'grid';
        });
    }
}
