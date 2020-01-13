<?php

namespace Tests\Integration;

use App\Channel;
use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Support\Arr;

class ThreadTest extends IntegrationTestCase
{
    /** @test */
    function should_have_model_fields()
    {
        $fields = [
            'author_id' => create(User::class)->id,
            'title' => 'Threadtitle',
            'body' => 'Threadbody'
        ];

        $this->assertDatabaseMissing('threads', $fields);

        $thread = new Thread(Arr::except($fields, ['author_id']));
        $thread->author()->associate($fields['author_id']);
        $thread->save();

        $this->assertDatabaseHas('threads', $fields);
        $this->assertInstanceOf(User::class, $thread->author);
    }

    /** @test */
    public function should_belong_to_channel()
    {
        /** @var Thread $thread */
        $thread = create(Thread::class);
        $channel = create(Channel::class);

        $this->assertEmpty($thread->channel);

        $thread->channel()->associate($channel->id);

        $this->assertInstanceOf(Channel::class, $thread->channel);
        $this->assertSame($channel->id, $thread->channel_id);
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
