<?php

use App\Reply;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reply::class, 2)->create();

        $thread = factory(\App\Thread::class)->create();
        factory(Reply::class, 2)->create(['thread_id' => $thread->id]);
    }
}
