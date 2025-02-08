<?php

namespace Zoker\Shop\Console\Commands;

use Illuminate\Console\Command;
use Zoker\Shop\Models\Product;

class AiSeoProductsCommand extends Command
{
    protected $signature = 'ai:seo-products
        {--all : Generate SEO for all products}
        {--limit=100 : Limit the number of products to process}';

    protected $description = 'Generate SEO for products';

    public $bar;

    public function handle()
    {
        if ($this->option('all')) {
            $this->info('Generating SEO for all products...');
            $products = Product::published()->take($this->option('limit'))->get();
        } else {
            $this->info('Generating SEO for products, that does not have SEO...');
            $products = Product::query()
                ->published()
                ->whereDoesntHave('seo', function ($query) {
                    $query->where('description', '!=', null)
                        ->where('description', '<>', '');
                })
                ->take($this->option('limit'))
                ->get();
        }

        $products->load('categories', 'brand', 'properties', 'seo');

        $this->bar = $this->output->createProgressBar($products->count());

        /* @var Product $product */
        foreach ($products as $product) {
            $product->generateSeoAI();
            $this->bar->advance();
        }

        $this->bar->finish();
        $this->info('Done');
    }
}
