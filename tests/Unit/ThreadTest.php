<?php

namespace Tests\Unit;

use App\User;
use App\Thread;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ThreadTest extends UnitTestCase {

   /** @test */
   function should_have_author() {
      $thread = new Thread;

      $this->assertInstanceOf(BelongsTo::class, $thread->author());
   }
}
