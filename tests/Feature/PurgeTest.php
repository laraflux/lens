<?php

namespace Laraflux\Lens\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laraflux\Lens\Models\Log;
use Laraflux\Lens\Tests\TestCase;

class PurgeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function clears_log_if_more_than()
    {
        Log::factory(1001)->create();

        $this->artisan('lens:purge-more-than')->assertSuccessful();

        $this->assertDatabaseCount('logs', config('lens.purge.more_than'));
    }

    /** @test */
    public function clear_log_if_older_than()
    {
        Log::factory()->create([
            'created_at' => now()->subDays(366),
        ]);

        $this->artisan('lens:purge-older-than')->assertSuccessful();

        $this->assertDatabaseCount('logs', 0);
    }
}
