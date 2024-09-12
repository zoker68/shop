<?php

namespace Zoker\Shop\View\Components\Widgets;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Models\Product;

class TopRanking extends Component
{
    public function render(): ?View
    {
        $categoryIds = config('shop.widgets.top_ranking.categories');
        if (! $categoryIds) {
            return null;
        }

        $topRanking = cache()->remember(
            'top_ranking_products',
            now()->addHour(),
            fn () => $this->getTopProducts($categoryIds)
        );

        return view('shop::components.widgets.top-ranking.default', compact('topRanking'));
    }

    private function getTopProducts(array $categoryIds): array
    {
        return Category::findMany($categoryIds)
            ->map(function (Category $category) {
                return [
                    'category' => $category,
                    'products' => Product::query()
                        ->forCategory($category)
                        ->published()
                        ->withAvg('reviews', 'rating')
                        ->withCount('reviews')
                        ->take(config('shop.widgets.top_ranking.limit', 3))
                        ->orderByDesc('reviews_avg_rating')
                        ->orderByDesc('reviews_count')
                        ->get(),
                ];
            })
            ->toArray();
    }
}
