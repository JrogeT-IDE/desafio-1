<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->constrained('students')
                ->onDelete('cascade');
            $table->foreignId('course_id')
                ->constrained('courses')
                ->onDelete('cascade');
            $table->timestamp('enrolled_at')->useCurrent();
            $table->timestamps();

            // Un estudiante no puede inscribirse dos veces en el mismo curso
            $table->unique(['student_id', 'course_id']);

            // Índices para queries comunes
            $table->index('student_id');
            $table->index('course_id');
            $table->index('enrolled_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
