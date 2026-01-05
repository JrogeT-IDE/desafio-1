<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Traits\ApiResponses;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        return $this->successResponse($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());

        return $this->createdResponse($course);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return $this->notFoundResponse('Course not found.');
        }

        return $this->successResponse($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, string $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return $this->notFoundResponse('Course not found.');
        }

        $course->update($request->all());

        return $this->successResponse($course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return $this->notFoundResponse('Course not found.');
        }

        $course->delete();

        return $this->successResponse(null, 'Course deleted successfully.');
    }
}
