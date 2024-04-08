<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.read', ['courses' => courses::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'courseName' => ['required', 'string', 'min:3', 'max:40'],
            'courseDescription' => ['required', 'min:8', 'max:500'],
        ]);

        courses::create($validateData);

        return to_route('course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($courses)
    {
        return view('courses.update', ['course' => courses::find($courses)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $courses)
    {
        $request->validate([
            'courseName' => ['required', 'string', 'min:3', 'max:40'],
            'courseDescription' => ['required', 'min:8', 'max:500'],
        ]);

        $course = courses::find($courses);

        $course->courseName = $request->courseName;
        $course->courseDescription = $request->courseDescription;

        $course->save();

        return to_route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($courses)
    {
        courses::find($courses)->delete();
        return to_route('course.index');
    }
}
