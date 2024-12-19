<?php

namespace Zoker\Shop\Console\Commands;

use Illuminate\Console\Command;
use Zoker\Shop\Models\SyncLog;

class SyncLogClearCommand extends Command
{
    protected $signature = 'sync:log-clear';

    protected $description = 'Command description';

    public function handle(): void
    {
        SyncLog::where('created_at', '<', now()->subDays(30))->delete();

        $this->comment('Logs cleared');
    }
}
