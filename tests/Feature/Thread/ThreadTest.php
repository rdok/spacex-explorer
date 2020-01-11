<?php

namespace Tests\Feature\Thread;

use App\Reply;
use App\Thread;
use Carbon\Carbon;
use Tests\Feature\FeatureTestCase;

class ThreadTest extends FeatureTestCase
{
    /** @test */
    public function should_index_threads()
    {
        $threads = factory(Thread::class, 2)->create();

        $response = $this->get('threads')
            ->assertStatus(200)
            ->assertSeeCardHeader('Threads');

        /** @var Thread $thread */
        foreach ($threads as $thread) {
            $response->assertSeeCardHeaderUrl($thread->url(), $thread->title)
                ->assertSeeCardText($thread->body);
        }
    }


    /** @test */
    public function should_read_a_thread()
    {
        /** @var Thread $thread */
        $thread = factory(Thread::class)->create();

        $header = sprintf('%s - %s', $thread->title, $thread->author->name);

        $this->get($thread->url())
            ->assertStatus(200)
            ->assertSeeCardHeader($header)
            ->assertSeeCardText($thread->body);
    }

    /** @test */
    public function should_read_thread_replies()
    {
        /** @var Thread $thread */
        $thread = factory(Thread::class)->create();
        $replies = factory(Reply::class, 2)
            ->create(['thread_id' => $thread->id]);

        $response = $this->get($thread->url())
            ->assertStatus(200);

        /** @var Reply $reply */
        foreach ($replies as $reply) {
            /** @var Carbon $createdAt */
            $createdAt = $reply->created_at;

            $response
                ->assertSeeCardTitle($reply->author->name)
                ->assertSeeCardText($reply->body)
                ->assertSeeCardTextMuted($createdAt->diffForHumans());
        }
    }
}
