<?php

namespace Tests\Feature;

use App\User;
use Tests\Functional\FunctionalTestCase;

class WelcomeTest extends FunctionalTestCase
{
    /** @test */
    public function should_index_threads()
    {
        $this->visit('/')
            ->seeInElement('title', 'SpaceX Explorer')
            ->seeInElement('div.title.m-b-md', 'SpaceX Explorer')
            ->seeLink('Threads', url('threads'));
    }
}
