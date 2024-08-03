<?php

namespace Zoker68\Shop\Http\Controllers;

use Zoker68\Shop\Enums\ProductsSorting;
use Zoker68\Shop\Enums\ViewType;
use Zoker68\Shop\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request)
    {
        $sortOptions = ProductsSorting::getOptions();
        $viewType = ViewType::getType()->value;

        return view('pages.search', compact('sortOptions', 'viewType'));
    }
}
