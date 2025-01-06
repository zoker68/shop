<?php

namespace Zoker\Shop\Http\Controllers;

use Illuminate\View\View;
use Zoker\Shop\Enums\ProductsSorting;
use Zoker\Shop\Enums\ViewType;
use Zoker\Shop\Models\Category;
use Zoker\Shop\View\Components\Partials\Meta;

class CategoryController extends Controller
{
    public function __invoke(string $slug = ''): View
    {
        $categoryId = array_search($slug, Category::getFullSlugMap());
        $category = Category::getAllCached()->firstWhere('id', $categoryId);

        if (! $category) {
            $category = Category::getAllCached()->firstWhere('id', 1);
        }

        abort_if(! $category->published, 404);

        $viewType = ViewType::getType()->value;

        $sortOptions = ProductsSorting::getOptions();

        Meta::setModel($category);

        return view('shop::pages.category', compact('category', 'viewType', 'sortOptions'));
    }
}
