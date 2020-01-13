<?php

/** @var Factory $factory */

use App\Channel;
use App\Thread;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Thread::class, function (Faker $faker) {
    $thread = factory(Thread::class, 'fillable')->make()->toArray();
    $thread['author_id'] = factory(User::class)->create()->id;

    return $thread;
});

$factory->state(Thread::class, 'channel', function () {
    return ['channel_id' => factory(Channel::class)->create()->id];
});

$factory->defineAs(Thread::class, 'fillable', function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});
