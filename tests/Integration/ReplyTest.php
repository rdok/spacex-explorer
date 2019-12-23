<?php

namespace Tests\Integration;

use App\User;
use App\Reply;
use App\Thread;
use Illuminate\Support\Arr;

class ReplyTest extends IntegrationTestCase {

   /** @test */
   function should_have_model_fields() {
      $data = [
         'author_id' => factory(User::class)->create()->id,
         'thread_id' => factory(Thread::class)->create()->id,
         'value' => 'ReplyValue',
      ];

      $this->assertDatabaseMissing('replies', $data);

      $thread = new Reply(Arr::only($data, ['value']));
      $thread->author()->associate($data['author_id']);
      $thread->thread()->associate($data['thread_id']);
      $thread->save();

      $this->assertDatabaseHas('replies', $data);
   }
}
