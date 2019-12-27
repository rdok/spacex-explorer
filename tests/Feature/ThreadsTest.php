<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Thread;

class ThreadsTest extends FeatureTestCase
{
   /** @test */
   public function testBasicTest()
   {
       $this->markTestIncomplete();

      $threads = factory(Thread::class, 2)->create();

      $response = $this->get('/threads');

      $response->assertStatus(200)
         ->assertJson([
         ['id' => $threads->get(0)->id],
         ['id' => $threads->get(1)->id],
      ]);
   }
}
