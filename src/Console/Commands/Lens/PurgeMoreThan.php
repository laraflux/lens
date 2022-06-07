<?php

namespace Laraflux\Lens\Console\Commands\Lens;

use Laraflux\Lens\Models\Log;
use Illuminate\Console\Command;

class PurgeMoreThan extends Command
{
    protected $signature = 'lens:purge-more-than';

    protected $description = 'Purge logs above more_than set in config/lens.php';

    public function handle()
    {
        $count = Log::count();
        $limit = config('lens.purge.more_than');

        if ($count > $limit) {
            Log::orderby('created_at', 'asc')->limit($count - $limit)->delete();
        }

        return Command::SUCCESS;
    }
}
