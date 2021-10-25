<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'José Ricardo Cauich Mis',
            'email' => 'josericardocauichmis@gmail.com',
            'imagen' => '',
            'password' => bcrypt('miscauich')
        ])->assignRole('SuperAdmin');

        User::create([
            'name' => 'Julio Enrique Cauich Mis',
            'email' => 'julioenriquecauichmis@gmail.com',
            'imagen' => '',
            'password' => bcrypt('miscauich123')
        ])->assignRole('RolSinPermisos');
    }
}
