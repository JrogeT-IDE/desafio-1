<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponses;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentId = request()->query('student_id');
        $courseId = request()->query('course_id');

        // if student_id is provided, get the courses the student is enrolled in
        // if course_id is provided, get the students enrolled in that course

        if ($studentId) {
            $student = Student::find($studentId);
            if (!$student) {
                return $this->notFoundResponse('Student not found.');
            }
            $enrollments = $student->courses;
            return $this->successResponse($enrollments);
        }

        if ($courseId) {
            $course = Course::find($courseId);
            if (!$course) {
                return $this->notFoundResponse('Course not found.');
            }
            $enrollments = $course->students;
            return $this->successResponse($enrollments);
        }

        return $this->badRequestResponse('Please provide either student_id or course_id as query parameter.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::find($validated['student_id']);
        $course = Course::find($validated['course_id']);

        if ($student->courses()->where('course_id', $course->id)->exists()) {
            return $this->conflictResponse('Student is already enrolled in this course.');
        }

        $student->courses()->attach($course->id);

        return $this->createdResponse('Student enrolled successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enrollment = Enrollment::find($id);

        if (!$enrollment) {
            return $this->notFoundResponse('Enrollment not found.');
        }

        $enrollment->delete();

        return $this->successResponse('Enrollment deleted successfully.');
    }
}
