<?php

namespace Tests\Integration;

use App\User;
use App\Thread;
use Illuminate\Support\Arr;

class ThreadTest extends IntegrationTestCase {

   /** @test */
   function should_have_model_fields() {
      $data = [
         'author_id' => factory(User::class)->create()->id,
         'title' => 'Threadtitle',
         'body' => 'Threadbody'
      ];

      $this->assertDatabaseMissing('threads', $data);

      $thread = new Thread(Arr::except($data, ['author_id']));
      $thread->author()->associate($data['author_id']);
      $thread->save();

      $this->assertDatabaseHas('threads', $data);
   }
}
