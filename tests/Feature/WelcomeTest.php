<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Thread;

class WelcomeTest extends FeatureTestCase
{
    /** @test */
    public function should_index_threads()
    {
        $response = $this->get('/');

        $response
            ->assertSee('<title>SpaceX Explorer</title>')
            ->assertSee('<div class="title m-b-md"> SpaceX Explorer</div>')
            ->assertSee('<a href="' . url('threads') . '">Threads</a>')
            ->assertStatus(200);
    }
}
