<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Test;
use Faker\Generator as Faker;

$factory->define(Test::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->paragraph(1,true),
        'fecha' => $faker->date(),
        'preguntas_total' => $faker->numberBetween(1,10),
        'preguntas_baja' => $faker->numberBetween(1,10),
        'preguntas_media' => $faker->numberBetween(1,10),
        'preguntas_alta' => $faker->numberBetween(1,10)
    ];
});
