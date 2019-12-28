<?php

namespace Tests\Feature;

use App\Thread;

class ThreadsTest extends FeatureTestCase
{
    /** @test */
    public function should_index_threads()
    {
        $threads = factory(Thread::class, 2)->create();

        $response = $this->get('/threads')
            ->assertSee('<div class="card-header">Threads</div>')
            ->assertStatus(200);

        $this->assertSeeThreads($response, $threads);
    }


    /** @test */
    public function should_view_a_thread()
    {
        $thread = factory(Thread::class)->create();

        $cardHeader = sprintf(
            '<div class="card-header">%s</div>',
            $thread->title
        );

        $response = $this->get('/threads/' . $thread->id)
            ->assertSee($cardHeader)
            ->assertStatus(200);

        $this->assertSeeThreadBody($response, $thread);
    }
}
