<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        'posted_at' => now(),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'post_id' => function () {
            return factory(Post::class)->create()->id;
        },
        
    ];
});
