<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Thread;

class ThreadsTest extends FeatureTestCase
{
    /** @test */
    public function should_index_threads()
    {
        $threads = factory(Thread::class, 2)->create();

        $response = $this->get('/threads');

        $response->assertStatus(200)
            ->assertSee('<div class="card-header">Threads</div>')
            ->assertSeeText($threads->get(0)->title)
            ->assertSeeText($threads->get(1)->title);
    }
}
