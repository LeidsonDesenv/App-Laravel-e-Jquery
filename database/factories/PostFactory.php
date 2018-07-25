<?php

use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "user_id" => 1,
        "body" => $faker->text
    ];
});
