<?php

namespace Tests\Feature\Thread;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Tests\Feature\FeatureTestCase;

class CreateReplyTest extends FeatureTestCase
{
    /** @test */
    public function should_reply_to_thread()
    {
        /** @var Thread $thread */
        $thread = factory(Thread::class)->create();

        $data = factory(Reply::class, 'fillable')->make()->toArray();

        $this->assertDatabaseMissing('replies', $data);

        $this->actingAs($user = factory(User::class)->create())
            ->post($thread->url() . '/replies', $data)
            ->assertRedirect($thread->url());

        $this->assertDatabaseHas('replies', array_merge($data, [
            'author_id' => $user->id,
            'thread_id' => $thread->id
        ]));

    }

    /** @test */
    public function should_deny_participation_to_guest()
    {
        $thread = new Thread;
        $thread->id = 2077;

        $this->expectException(AuthenticationException::class);

        $this->post($thread->url() . '/replies');
    }
}
