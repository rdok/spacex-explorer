<?php

namespace Tests\Feature\Assertions;

use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Support\Collection;

trait Thread
{
    protected function assertSeeThreads(TestResponse $response, Collection $threads)
    {
        foreach ($threads as $thread) {
            $this->assertSeeThread($response, $thread);
        }

        return $this;
    }

    protected function assertSeeThread(TestResponse $response, $thread): void
    {
        $this->assertNotEmpty($thread->id);
        $this->assertNotEmpty($thread->title);
        $this->assertNotEmpty($thread->body);

        $this->assertSeeThreadLink($response, $thread);
        $this->assertSeeThreadBody($response, $thread);
    }

    protected function assertSeeThreadLink(TestResponse $response, $thread): void
    {
        $url = url('threads/' . $thread->id);
        $link = sprintf('<a href="%s">%s</a>', $url, $thread->title);
        $response->assertSee($link);
    }

    protected function assertSeeThreadBody(TestResponse $response, $thread): void
    {
        $response->assertSee('<div class="body">' . $thread->body . '</div>');
    }
}
