<?php

namespace Zoker\Shop\Http\Controllers;

use Zoker\Shop\Enums\ProductStatus;
use Zoker\Shop\Models\Product;

class ProductController extends Controller
{
    public function __invoke(Product $product)
    {
        abort_if(! $product->published || $product->status !== ProductStatus::APPROVED, 404);

        $product->load('categories');

        return view('pages.product', compact('product'));
    }
}
