<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Asignatura;
use Faker\Generator as Faker;

$factory->define(Asignatura::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->paragraph(1,true)
    ];
});
