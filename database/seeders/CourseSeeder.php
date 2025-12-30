<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'PHP Avanzado',
                'description' => 'Aprende PHP orientado a objetos, patrones de diseño y mejores prácticas.',
                'start_date' => Carbon::now()->addDays(10)->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths(3)->format('Y-m-d'),
            ],
            [
                'title' => 'Laravel Desde Cero',
                'description' => 'Domina el framework Laravel para desarrollar aplicaciones web modernas.',
                'start_date' => Carbon::now()->addDays(15)->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths(4)->format('Y-m-d'),
            ],
            [
                'title' => 'API RESTful con Laravel',
                'description' => 'Construye APIs profesionales siguiendo los estándares REST.',
                'start_date' => Carbon::now()->addDays(20)->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths(2)->format('Y-m-d'),
            ],
            [
                'title' => 'MySQL y Bases de Datos',
                'description' => 'Aprende diseño de bases de datos, consultas avanzadas y optimización.',
                'start_date' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths(2)->format('Y-m-d'),
            ],
            [
                'title' => 'Testing con PHPUnit',
                'description' => 'Desarrolla software confiable mediante tests unitarios e integración.',
                'start_date' => Carbon::now()->addDays(30)->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths(1)->format('Y-m-d'),
            ],
            [
                'title' => 'Vue.js Frontend',
                'description' => 'Crea interfaces de usuario reactivas con Vue.js 3.',
                'start_date' => Carbon::now()->addDays(25)->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths(3)->format('Y-m-d'),
            ],
            [
                'title' => 'Docker para Desarrolladores',
                'description' => 'Conteneriza tus aplicaciones y mejora tu flujo de trabajo.',
                'start_date' => Carbon::now()->addDays(12)->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths(1)->format('Y-m-d'),
            ],
            [
                'title' => 'Git y GitHub Profesional',
                'description' => 'Control de versiones avanzado y colaboración en equipo.',
                'start_date' => Carbon::now()->subDays(5)->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths(1)->format('Y-m-d'),
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
