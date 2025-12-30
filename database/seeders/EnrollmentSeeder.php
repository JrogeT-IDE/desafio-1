<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inscribir algunos estudiantes en múltiples cursos
        $enrollments = [
            // Juan Pérez en 3 cursos
            ['student_id' => 1, 'course_id' => 1],
            ['student_id' => 1, 'course_id' => 2],
            ['student_id' => 1, 'course_id' => 4],

            // María García en 2 cursos
            ['student_id' => 2, 'course_id' => 2],
            ['student_id' => 2, 'course_id' => 6],

            // Carlos López en 4 cursos
            ['student_id' => 3, 'course_id' => 1],
            ['student_id' => 3, 'course_id' => 3],
            ['student_id' => 3, 'course_id' => 5],
            ['student_id' => 3, 'course_id' => 7],

            // Ana Martínez en 2 cursos
            ['student_id' => 4, 'course_id' => 4],
            ['student_id' => 4, 'course_id' => 8],

            // Pedro Sánchez en 3 cursos
            ['student_id' => 5, 'course_id' => 2],
            ['student_id' => 5, 'course_id' => 3],
            ['student_id' => 5, 'course_id' => 5],

            // Laura Fernández en 2 cursos
            ['student_id' => 6, 'course_id' => 1],
            ['student_id' => 6, 'course_id' => 6],

            // Diego Torres en 3 cursos
            ['student_id' => 7, 'course_id' => 3],
            ['student_id' => 7, 'course_id' => 4],
            ['student_id' => 7, 'course_id' => 7],

            // Sofía Rodríguez en 2 cursos
            ['student_id' => 8, 'course_id' => 5],
            ['student_id' => 8, 'course_id' => 8],

            // Martín González en 4 cursos
            ['student_id' => 9, 'course_id' => 1],
            ['student_id' => 9, 'course_id' => 2],
            ['student_id' => 9, 'course_id' => 6],
            ['student_id' => 9, 'course_id' => 7],

            // Valentina Ruiz en 3 cursos
            ['student_id' => 10, 'course_id' => 3],
            ['student_id' => 10, 'course_id' => 4],
            ['student_id' => 10, 'course_id' => 8],
        ];

        foreach ($enrollments as $enrollment) {
            Enrollment::create($enrollment);
        }
    }
}
