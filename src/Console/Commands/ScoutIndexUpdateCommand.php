<?php

namespace Zoker\Shop\Console\Commands;

use Illuminate\Console\Command;

class ScoutIndexUpdateCommand extends Command
{
    protected $signature = 'scout:index-update';

    protected $description = 'Reindex the Scout index';

    public function handle(): void
    {
        $this->info('Syncing Scout index settings...');

        $this->call('scout:sync-index-settings');

        $this->info('Flush Scout index...');

        $this->call('scout:flush', ['model' => 'Zoker\Shop\Models\Product']);

        $this->info('Reindexing...');

        $this->call('scout:import', ['model' => 'Zoker\Shop\Models\Product']);

        $this->info('Done');
    }
}
