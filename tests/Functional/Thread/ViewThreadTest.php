<?php

namespace Tests\Functional\Thread;

use App\Reply;
use App\Thread;
use Carbon\Carbon;
use Exception;
use Laravel\BrowserKitTesting\HttpException;
use Tests\Functional\FunctionalTestCase;

class ViewThreadTest extends FunctionalTestCase
{
    /** @test */
    public function view_threads_index()
    {
        $threads = create(Thread::class, 2);

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
    public function does_not_view_threads_with_invalid_channel()
    {
        /** @var Thread $thread */
        $thread = factory(Thread::class)->state('channel')->create();

        $url = url('threads') . '/' . $thread->id;

        try {
            $this->visit($url);
        } catch (Exception $e) {
            $message = sprintf(
                "A request to [%s] failed. Received status code [404].",
                $url
            );
            $this->assertSame($message, $e->getMessage());
        }

        $this->assertInstanceOf(HttpException::class, $e);
    }

    /** @test */
    public function view_thread_without_a_channel()
    {
        /** @var Thread $thread */
        $thread = create(Thread::class);

        $this->visit($thread->url())
            ->seeInElement('div.card-header.bg-white', $thread->title)
            ->seeInElement('p.card-text', $thread->body);
    }

    /** @test */
    public function view_thread_with_a_channel()
    {
        /** @var Thread $thread */
        $thread = factory(Thread::class)->state('channel')->create();

        $this->visit($thread->url())
            ->seeInElement('div.card-header.bg-white', $thread->title)
            ->seeInElement('p.card-text', $thread->body);
    }

    /** @test */
    public function view_thread_replies()
    {
        /** @var Thread $thread */
        $thread = create(Thread::class);
        $replies = create(Reply::class, 2, ['thread_id' => $thread->id]);

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
