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
        $days = config('lens.purge.older_than');

        if ($days === 0) {
            return Command::SUCCESS;
        }

        $date = now()->subDays($days);

        Log::where('created_at', '<=', $date)->delete();

        return Command::SUCCESS;
    }
}
