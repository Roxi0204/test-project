<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Silvia Lladó',
            'username' => 'Sllado01',
            'email' => 'sllado01@cendrassos.net',
            'password'=> bcrypt('123456789'),
        ]);
        User::factory()->create([
            'name' => 'Dani Prados',
            'username' => 'Dprados02',
            'email' => 'dprados02@cendrassos.net',
            'password'=> bcrypt('123456789'),
        ]);
        User::factory()->create([
            'name' => 'Xavi Ballejo',
            'username' => 'Xballejo03',
            'email' => 'xballejo03@cendrassos.net',
            'password'=> bcrypt('123456789'),
        ]);
        User::factory()->create([
            'name' => 'Roxana Quevedo',
            'username' => 'roxi0204',
            'email' => 'roxana.quevedo02@gmail.com',
            'password'=> bcrypt('Gilberto@2024'),
        ]);
    }
}