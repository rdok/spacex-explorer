<?php

namespace Tests\Feature;

use App\Thread;
use Illuminate\Support\Collection;
use Tests\Functional\FunctionalTestCase;

class WelcomeTest extends FunctionalTestCase
{
    /** @test */
    public function should_index_threads()
    {
        /** @var Collection $threads */
        $threads = factory(Thread::class, 2)->create();

        $this->visit('/')
            ->seeInElement('title', 'SpaceX Explorer')
            ->seeInElement('div.title.m-b-md', 'SpaceX Explorer')
            ->seeLink('Threads', url('threads'));

        foreach ($threads as $thread) {
            $this->seeLink($thread->title, $thread->url());
        }
    }
}
