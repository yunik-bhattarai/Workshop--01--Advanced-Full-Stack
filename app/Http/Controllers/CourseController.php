<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of courses.
     */
    public function index()
    {
        return view('course.list', [
            'courses' => Course::all(),
        ]);
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created course.
     */
    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display a specific course.
     */
    public function show(Course $course)
    {
        return view('course.detail', [
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing a course.
     */
    public function edit(Course $course)
    {
        return view('course.edit', [
            'course' => $course,
        ]);
    }

    /**
     * Update a course.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Delete a course.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}