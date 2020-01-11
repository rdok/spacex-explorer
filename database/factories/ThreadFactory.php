<?php

/** @var Factory $factory */

use App\Thread;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Thread::class, function (Faker $faker) {
    $thread = factory(Thread::class, 'fillable')->make()->toArray();
    $thread['author_id'] = function () {
        return factory(User::class)->create()->id;
    };

    return $thread;
});

$factory->defineAs(Thread::class, 'fillable', function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});
