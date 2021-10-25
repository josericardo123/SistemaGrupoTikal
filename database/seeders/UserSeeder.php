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
            'email' => 'ricardo.cauich@tecnobytepeninsula.com',
            'imagen' => '',
            'password' => bcrypt('Peninsula#2')
        ])->assignRole('SuperAdmin');

        User::create([
            'name' => 'Jorge Alfredo Cabañas Sandoval',
            'email' => 'direccion@tecnobytepeninsula.com',
            'imagen' => '',
            'password' => bcrypt('Peninsula1234#')
        ])->assignRole('RolSinPermisos');
    }
}
