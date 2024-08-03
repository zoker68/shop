<?php

namespace Zoker68\Shop\Http\Controllers;

use Zoker68\Shop\Enums\ProductStatus;
use Zoker68\Shop\Models\Product;

class ProductController extends Controller
{
    public function __invoke(Product $product)
    {
        abort_if(! $product->published || $product->status !== ProductStatus::APPROVED, 404);

        $product->load('categories');

        return view('pages.product', compact('product'));
    }
}
