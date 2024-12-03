<?php

namespace Zoker\Shop\Http\Controllers;

use Zoker\Shop\Models\Product;

class ProductController extends Controller
{
    public function __invoke(Product $product)
    {
        abort_if(! $product->published, 404);

        $product->load('categories');

        return view('shop::pages.product', compact('product'));
    }
}
