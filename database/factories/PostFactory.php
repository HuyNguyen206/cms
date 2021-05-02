<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        //
        'title' => $title,
        'slug' => \Illuminate\Support\Str::slug($title),
        'content' => $faker->paragraph(5),
        'description' => $faker->paragraph(1),
        'category_id' => 1,
        'user_id' => User::all()->random()->id
    ];
});
