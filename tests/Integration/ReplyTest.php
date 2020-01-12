<?php

namespace Tests\Integration;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Support\Arr;

class ReplyTest extends IntegrationTestCase
{

    /** @test */
    function should_have_model_fields()
    {
        $data = [
            'author_id' => create(User::class)->id,
            'thread_id' => create(Thread::class)->id,
            'body' => 'ReplyValue',
        ];

        $this->assertDatabaseMissing('replies', $data);

        $thread = new Reply(Arr::only($data, ['body']));
        $thread->author()->associate($data['author_id']);
        $thread->thread()->associate($data['thread_id']);
        $thread->save();

        $this->assertDatabaseHas('replies', $data);
    }
}
