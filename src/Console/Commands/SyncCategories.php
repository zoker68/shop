<?php

namespace Zoker\Shop\Console\Commands;

use Illuminate\Console\Command;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Models\SkladCategory;
use Zoker\Shop\Services\MoySklad;

class SyncCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync categories from moySklad';

    protected $bar = null;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $offset = 0;
        $handled = [];

        $this->info('Start');

        do {

            $response = MoySklad::getCategories($offset);
            if (! $this->bar) {
                $this->bar = $this->output->createProgressBar($this->getItemsCount($response));
            }
            foreach ($response->rows as $category) {
                $handled[] = [
                    'foreign_id' => $category->id,
                    'name' => $category->name,
                    'parent' => $category->pathName,
                    'category_id' => Category::getAllCached()->random()->id,
                ];
            }

            $offset += $response->meta->limit;

            SkladCategory::upsert($handled, ['foreign_id'], ['name', 'parent', 'category_id']);
            $this->bar->advance(count($response->rows));

        } while ($this->hasNextImportPage($response));

        $this->bar->finish();

        $this->info('Finished');

    }

    public function hasNextImportPage(mixed $response): bool
    {
        return $response->meta->size > $response->meta->offset + $response->meta->limit;
    }

    public function getItemsCount(mixed $response): mixed
    {
        return min($response->meta->size, $response->meta->limit);
    }
}
