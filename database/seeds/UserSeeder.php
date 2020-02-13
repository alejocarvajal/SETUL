<?php

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
        DB::table('users')->insert([
            'nombre' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        /*factory(User::class)->create([
            'nombre' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);*/
    }
}
