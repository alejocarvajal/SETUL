<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_configuracion')->insert([
            'nombre' => 'fondo_juego',
            'valor' => 'images/Fondo2.jpg',
        ]);
        DB::table('table_configuracion')->insert([
            'nombre' => 'cantidad_preguntas',
            'valor' => '9',
        ]);
        DB::table('table_configuracion')->insert([
            'nombre' => 'fondo_modo_juego',
            'valor' => 'images/Fondo2.jpg',
        ]);
    }
}
