<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciclo;

class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */public function run(): void
    {
        $ciclos = [
            'Informatica y comunicaciones',
            'Administracion y gestion',
            'Sanidad',
            'Servicios socioculturales y a la comunidad',
            'Electricidad y electronica',
            'Imagen y sonido',
            'Hosteleria y turismo',
            'Fabricacion mecanica',
            'Comercio y marketing',
            'Otros'
        ];

        foreach ($ciclos as $description) {
            Ciclo::updateOrCreate(
                ['name' => $description], 
                ['name' => $description] 
            );
        }
    }
}

