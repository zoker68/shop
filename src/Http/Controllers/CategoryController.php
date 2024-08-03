<?php

namespace Zoker68\Shop\Http\Controllers;

use Illuminate\View\View;
use Zoker68\Shop\Enums\ProductsSorting;
use Zoker68\Shop\Enums\ViewType;
use Zoker68\Shop\Models\Category;

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

        return view('pages.category', compact('category', 'viewType', 'sortOptions'));
    }

    public function getViewType(): string
    {
        return cache()->rememberForever('viewType', function () {
            return 'grid';
        });
    }
}
