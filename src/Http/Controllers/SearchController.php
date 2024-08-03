<?php

namespace Zoker\Shop\Http\Controllers;

use Zoker\Shop\Enums\ProductsSorting;
use Zoker\Shop\Enums\ViewType;
use Zoker\Shop\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request)
    {
        $sortOptions = ProductsSorting::getOptions();
        $viewType = ViewType::getType()->value;

        return view('shop::pages.search', compact('sortOptions', 'viewType'));
    }
}
