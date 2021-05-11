<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        //
        'facebook' => 'facebook.com',
        'youtube' => 'youtube.com',
        'about' => $faker->paragraph(3),
        'avatar' => null
    ];
});
