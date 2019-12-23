<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thread;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Thread::class, function (Faker $faker) {
   return [
      'title' => $faker->sentence,
      'body' => $faker->sentence,
      'author_id' => function () {
         return factory(User::class)->create()->id;
      },
   ];
});
