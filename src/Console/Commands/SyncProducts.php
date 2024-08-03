<?php

namespace Zoker\Shop\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Zoker\Shop\Models\Product;
use Zoker\Shop\Models\SkladCategory;
use Zoker\Shop\Services\MoySklad;

class SyncProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync products from moySklad';

    protected $bar = null;

    protected Collection $skladCategories;

    protected Collection $products;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $offset = 0;
        $handled = [];

        $this->info('Start');

        $this->loadCategories();
        $this->loadProducts();

        do {

            $response = MoySklad::getProducts($offset);
            if (! $this->bar) {
                $this->bar = $this->output->createProgressBar($this->getItemsCount($response));
                $this->bar->start();
            }

            collect($response->rows)->each(function ($item) {
                $this->bar->advance();
                $categoryForeignId = $this->getCategoryForeignId($item);
                if (! isset($this->skladCategories[$categoryForeignId]) || ! $this->skladCategories[$categoryForeignId]) {
                    return;
                }
                if ($this->products->contains('foreign_id', $item->id)) {
                    return;
                }
                $product = Product::create([
                    'foreign_id' => $item->id,
                    'name' => $item->name,
                    'price' => (int) $item->salePrices[0]->value / 100,
                    'stock' => (int) $item->quantity,
                ]);
                $product->categories()->attach([$this->skladCategories[$categoryForeignId]]);
            });

            $offset += $response->meta->limit;

        } while ($this->hasNextImportPage($response));

        $this->bar->finish();

        $this->info('Finished');

    }

    public function hasNextImportPage(mixed $response): bool
    {
        return $response->meta->size > $response->meta->offset + $response->meta->limit;
    }

    public function getItemsCount(mixed $response): int
    {
        return $response->meta->size;
    }

    private function getCategoryForeignId(mixed $product): ?string
    {
        $category = explode('/', $product->productFolder->meta->href);

        return end($category);
    }

    private function loadCategories(): void
    {
        $this->skladCategories = SkladCategory::all(['foreign_id', 'category_id'])->pluck('category_id', 'foreign_id');
    }

    private function loadProducts()
    {
        $this->products = Product::all(['foreign_id']);
    }
}
