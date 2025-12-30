<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'birthdate' => '2000-05-15',
                'nationality' => 'Argentina',
            ],
            [
                'name' => 'María García',
                'email' => 'maria.garcia@example.com',
                'birthdate' => '1999-08-22',
                'nationality' => 'Chile',
            ],
            [
                'name' => 'Carlos López',
                'email' => 'carlos.lopez@example.com',
                'birthdate' => '2001-03-10',
                'nationality' => 'Uruguay',
            ],
            [
                'name' => 'Ana Martínez',
                'email' => 'ana.martinez@example.com',
                'birthdate' => '2000-11-30',
                'nationality' => 'Paraguay',
            ],
            [
                'name' => 'Pedro Sánchez',
                'email' => 'pedro.sanchez@example.com',
                'birthdate' => '1998-07-18',
                'nationality' => 'Bolivia',
            ],
            [
                'name' => 'Laura Fernández',
                'email' => 'laura.fernandez@example.com',
                'birthdate' => '2002-01-25',
                'nationality' => 'Argentina',
            ],
            [
                'name' => 'Diego Torres',
                'email' => 'diego.torres@example.com',
                'birthdate' => '1999-12-05',
                'nationality' => 'Chile',
            ],
            [
                'name' => 'Sofía Rodríguez',
                'email' => 'sofia.rodriguez@example.com',
                'birthdate' => '2001-09-14',
                'nationality' => 'Uruguay',
            ],
            [
                'name' => 'Martín González',
                'email' => 'martin.gonzalez@example.com',
                'birthdate' => '2000-04-08',
                'nationality' => 'Argentina',
            ],
            [
                'name' => 'Valentina Ruiz',
                'email' => 'valentina.ruiz@example.com',
                'birthdate' => '1999-06-20',
                'nationality' => 'Chile',
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
