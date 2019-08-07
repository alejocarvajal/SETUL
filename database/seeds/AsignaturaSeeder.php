<?php
use App\Asignatura;
use Illuminate\Database\Seeder;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Asignatura::class)->create([
            'nombre' => 'Derecho 1',
            'descripcion' => 'Derecho 1'
        ]);
        factory(Asignatura::class)->create([
            'nombre' => 'Derecho 2',
            'descripcion' => 'Derecho 2'
        ]);
    }
}
