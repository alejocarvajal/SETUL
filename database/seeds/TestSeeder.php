<?php
use App\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Test::class)->create([
            'nombre' => 'Derecho 1',
            'descripcion' => 'Derecho 1',
            'fecha' => now(),
            'preguntas_total' => 10,
            'preguntas_baja' => 4,
            'preguntas_media' => 4,
            'preguntas_alta' => 2
        ]);
        factory(Test::class)->create([
            'nombre' => 'Derecho 2',
            'descripcion' => 'Derecho 2',
            'fecha' => now(),
            'preguntas_total' => 10,
            'preguntas_baja' => 4,
            'preguntas_media' => 4,
            'preguntas_alta' => 2
        ]);
    }
}
