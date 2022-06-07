<?php

namespace Laraflux\Lens\Tests\Feature;

use Laraflux\Lens\Tests\TestCase;
use Laraflux\Lens\Tests\Helpers\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function creates_entry_for_model_event()
    {
        $article = Article::create([
            'title' => 'Test Article',
        ]);

        $this->assertDatabaseHas('logs', [
            'loggable_id' => $article->id,
            'event' => 'created',
        ]);
    }

    /** @test */
    function does_not_create_entry_for_non_observed_event()
    {
        $article = Article::create([
            'title' => 'Test Article',
        ]);

        $this->assertDatabaseMissing('logs', [
            'loggable_id' => $article->id,
            'event' => 'creating',
        ]);
    }

    /** @test */
    function can_get_logs_for_model()
    {
        $article = Article::create([
            'title' => 'Test Article',
        ]);

        $this->assertCount(1, $article->logs);
    }
}
