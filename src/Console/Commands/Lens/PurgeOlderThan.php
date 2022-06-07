<?php

namespace Laraflux\Lens\Console\Commands\Lens;

use Laraflux\Lens\Models\Log;
use Illuminate\Console\Command;

class PurgeOlderThan extends Command
{
    protected $signature = 'lens:purge-older-than';

    protected $description = 'Purge logs above older_than set in config/lens.php';

    public function handle()
    {
        $date = now()->subDays(config('lens.purge.older_than'));

        Log::where('created_at', '<=', $date)->delete();

        return Command::SUCCESS;
    }
}
