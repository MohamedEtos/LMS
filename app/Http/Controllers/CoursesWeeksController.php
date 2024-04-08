<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\coursesWeeks;
use Illuminate\Http\Request;

class CoursesWeeksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('weeks.read', [
            'weeks' => coursesWeeks::with(['coursesWeeksRel'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('weeks.create', ['courses' => courses::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'NumberOfWeeks' => ['required', 'numeric'],
            'coursesId' => 'exists:courses,id',
        ]);

        coursesWeeks::create($validateData);

        return to_route('week.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(coursesWeeks $coursesWeeks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($coursesWeeks)
    {
        return view('weeks.update', [
            'week' => coursesWeeks::find($coursesWeeks),
            'courses' => courses::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $coursesWeeks)
    {
        $request->validate([
            'NumberOfWeeks' => ['required', 'numeric'],
            'coursesId' => 'exists:courses,id',
        ]);

        $week = coursesWeeks::find($coursesWeeks);

        $week->NumberOfWeeks = $request->NumberOfWeeks;
        $week->coursesId = $request->coursesId;

        $week->save();

        return to_route('week.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($coursesWeeks)
    {
        coursesWeeks::find($coursesWeeks)->delete();

        return to_route('week.index');
    }
}
