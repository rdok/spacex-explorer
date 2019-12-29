<?php

use App\User;
use App\Thread;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 2)->create();
        factory(Thread::class, 2)->create();

         $this->call(ReplySeeder::class);
    }
}
