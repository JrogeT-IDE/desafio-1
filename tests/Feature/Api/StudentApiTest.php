<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Student;

class StudentApiTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $token;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->token = $this->user->createToken('test-token')->plainTextToken;
    }

    /** @test */
    public function can_list_students()
    {
        Student::factory()->count(3)->create();

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
                         ->getJson('/api/students');

        $response->assertStatus(200);
    }

    /** @test */
    public function can_create_student()
    {
        $studentData = [
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'birthdate' => '2000-05-15',
            'nationality' => 'Argentina',
        ];

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
                         ->postJson('/api/students', $studentData);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Student created successfully',
                 ]);

        $this->assertDatabaseHas('students', [
            'email' => 'juan@example.com',
        ]);
    }

    /** @test */
    public function cannot_create_student_without_authentication()
    {
        $studentData = [
            'name' => 'Test Student',
            'email' => 'test@example.com',
            'birthdate' => '2000-01-01',
            'nationality' => 'Argentina',
        ];

        $response = $this->postJson('/api/students', $studentData);

        $response->assertStatus(401);
    }

    /** @test */
    public function email_must_be_unique_when_creating_student()
    {
        Student::factory()->create(['email' => 'duplicate@example.com']);

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
                         ->postJson('/api/students', [
                             'name' => 'Test',
                             'email' => 'duplicate@example.com',
                             'birthdate' => '2000-01-01',
                             'nationality' => 'Argentina',
                         ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['email']);
    }

    /** @test */
    public function birthdate_cannot_be_future()
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
                         ->postJson('/api/students', [
                             'name' => 'Test',
                             'email' => 'test@example.com',
                             'birthdate' => '2030-01-01',
                             'nationality' => 'Argentina',
                         ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['birthdate']);
    }

    /** @test */
    public function can_get_single_student()
    {
        $student = Student::factory()->create();

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
                         ->getJson("/api/students/{$student->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => [
                         'id' => $student->id,
                         'name' => $student->name,
                         'email' => $student->email,
                     ],
                 ]);
    }

    /** @test */
    public function returns_404_for_nonexistent_student()
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
                         ->getJson('/api/students/99999');

        $response->assertStatus(404);
    }

    /** @test */
    public function can_update_student()
    {
        $student = Student::factory()->create();

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
                         ->putJson("/api/students/{$student->id}", [
                             'name' => 'Updated Name',
                             'nationality' => 'Chile',
                         ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Student updated successfully',
                 ]);

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name' => 'Updated Name',
            'nationality' => 'Chile',
        ]);
    }

    /** @test */
    public function can_delete_student()
    {
        $student = Student::factory()->create();

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
                         ->deleteJson("/api/students/{$student->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('students', [
            'id' => $student->id,
        ]);
    }

    /** @test */
    public function can_search_students_by_name()
    {
        Student::factory()->create(['name' => 'Juan Pérez']);
        Student::factory()->create(['name' => 'María García']);
        Student::factory()->create(['name' => 'Pedro Sánchez']);

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
                         ->getJson('/api/students?name=Juan');

        $response->assertStatus(200);

        $data = $response->json('data.data');
        $this->assertCount(1, $data);
        $this->assertEquals('Juan Pérez', $data[0]['name']);
    }
}
