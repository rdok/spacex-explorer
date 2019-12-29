<?php

use App\Reply;
use App\Thread;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Reply::class, function (Faker $faker) {

    /** @var Reply $reply */
    $reply = factory(Reply::class, 'fillable')->make();

    return array_merge($reply->toArray(), [
        'author_id' => function () {
            return factory(User::class)->create();
        },
        'thread_id' => function () {
            return factory(Thread::class)->create();
        },
    ]);
});

$factory->defineAs(Reply::class, 'fillable', function (Faker $faker) {
    return ['body' => $faker->sentence()];
});
