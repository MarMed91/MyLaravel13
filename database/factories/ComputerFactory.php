<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Computer::class, function (Faker $faker) {
    return [
      "brand" => $faker->word,
      "model" => $faker->unique()->word,
      "ram" =>$faker->numberBetween(4, 32),
      "memory" => $faker->numberBetween(4, 16)
    ];
});
