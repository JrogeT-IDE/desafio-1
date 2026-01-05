<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponses;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return $this->successResponse($students, 'Students retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'nationality' => $request->nationality,
        ]);

        return $this->createdResponse($student, 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return $this->notFoundResponse('Student not found');
        }

        return $this->successResponse($student, 'Student retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return $this->notFoundResponse('Student not found');
        }

        $student->update($request->only(['name', 'email', 'birthdate', 'nationality']));

        return $this->successResponse($student, 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return $this->notFoundResponse('Student not found');
        }

        $student->delete();

        return $this->successResponse(null, 'Student deleted successfully');
    }
}
