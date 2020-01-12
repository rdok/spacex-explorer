<?php

namespace Tests\Integration;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Support\Arr;

class ThreadTest extends IntegrationTestCase
{

    /** @test */
    function should_have_model_fields()
    {
        $data = [
            'author_id' => create(User::class)->id,
            'title' => 'Threadtitle',
            'body' => 'Threadbody'
        ];

        $this->assertDatabaseMissing('threads', $data);

        $thread = new Thread(Arr::except($data, ['author_id']));
        $thread->author()->associate($data['author_id']);
        $thread->save();

        $this->assertDatabaseHas('threads', $data);
    }

    /** @test */
    function it_should_have_many_replies()
    {
        $thread = create(Thread::class);
        $replies = create(Reply::class, null, ['thread_id' => $thread->id]);

        $this->assertEquals(
            $replies->pluck('id'),
            $thread->replies()->pluck('id')
        );
    }
}
