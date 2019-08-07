<?php

use App\User;
use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'nombre' => 'Alejandro Carvajal',
            'email' => 'alejo.carvajal03@gmail.com',
            'clave' => bcrypt('123'),
        ]);


        factory(User::class, 2)->create();
    }
}
