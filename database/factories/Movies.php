<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->sentence,
        'info' => $faker->paragraph(50),
        'img' => $faker->image('public/storage/images/',640,480, null, false),
        'status' => true,

    ];
});
