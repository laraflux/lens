<?php

namespace Laraflux\Lens\Console\Commands\Lens;

use Illuminate\Console\Command;
use Laraflux\Lens\Models\Log;

class PurgeMoreThan extends Command
{
    protected $signature = 'lens:purge-more-than';

    protected $description = 'Purge logs above more_than set in config/lens.php';

    public function handle()
    {
        $limit = config('lens.purge.more_than');

        if ($limit === 0) {
            return Command::SUCCESS;
        }

        $count = Log::count();

        if ($count > $limit) {
            Log::orderby('created_at', 'asc')->limit($count - $limit)->delete();
        }

        return Command::SUCCESS;
    }
}
