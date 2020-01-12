<?php

namespace Tests\Functional\Thread;

use App\Reply;
use App\Thread;
use Carbon\Carbon;
use Tests\Functional\FunctionalTestCase;

class ReadThreadTest extends FunctionalTestCase
{
    /** @test */
    public function should_index_threads()
    {
        $threads = factory(Thread::class, 2)->create();

        $this->visit('threads')
            ->seeInElement('div.card-header.bg-white', 'Threads');

        /** @var Thread $thread */
        foreach ($threads as $thread) {
            $this
                ->seeInElement('div.card-header.bg-white', $thread->title)
                ->seeLink($thread->title, $thread->url());

            $this->seeInElement('p.card-text', $thread->body);
        }
    }


    /** @test */
    public function should_read_a_thread()
    {
        /** @var Thread $thread */
        $thread = factory(Thread::class)->create();

        $this->visit($thread->url())
            ->seeInElement('div.card-header.bg-white', $thread->title)
            ->seeInElement('p.card-text', $thread->body);
    }

    /** @test */
    public function should_read_thread_replies()
    {
        /** @var Thread $thread */
        $thread = factory(Thread::class)->create();
        $replies = factory(Reply::class, 2)
            ->create(['thread_id' => $thread->id]);

        $this->visit($thread->url());

        /** @var Carbon $createdAt */
        /** @var Reply $reply */

        foreach ($replies as $reply) {
            $createdAt = $reply->created_at;

            $this->seeInElement('h5.card-title', $reply->author->name)
                ->seeInElement('p.card-text', $reply->body);

            $this->seeInElement('p.card-text', $createdAt->diffForHumans())
                ->seeInElement('small.text-muted', $createdAt->diffForHumans());
        }
    }
}
