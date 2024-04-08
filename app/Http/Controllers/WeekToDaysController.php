<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\coursesWeeks;
use App\Models\WeekToDays;
use Illuminate\Http\Request;

class WeekToDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('days.read', [
            'days' => WeekToDays::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('days.create', ['courses_weeks' => coursesWeeks::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'NumberOfDays' => ['required', 'numeric', 'max:7', 'min:1'],
            'VideoName' => ['required', 'string'],
            'VideoUrl' => ['required', 'url'],
            'weekId' => ['required', 'exists:courses_weeks,id'],
        ]);

        WeekToDays::create($validateData);

        return to_route('day.index', [
            'days' => WeekToDays::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(WeekToDays $weekToDays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($weekToDays)
    {
        return view('days.update', [
            'courses_weeks' => coursesWeeks::all(),
            'day' => WeekToDays::find($weekToDays),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $weekToDays)
    {
        $validateData = $request->validate([
            'NumberOfDays' => ['required', 'numeric', 'max:7', 'min:1'],
            'VideoName' => ['required', 'string'],
            'VideoUrl' => ['required', 'url'],
            'weekId' => ['required', 'exists:courses_weeks,id'],
        ]);

        $day = WeekToDays::find($weekToDays);
        $day->NumberOfDays = $request->NumberOfDays;
        $day->VideoName = $request->VideoName;
        $day->VideoUrl = $request->VideoUrl;
        $day->weekId = $request->weekId;
        $day->save();

        return to_route('day.index', [
            'days' => WeekToDays::all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($weekToDays)
    {
        WeekToDays::find($weekToDays)->delete();

        return to_route('day.index', [
            'days' => WeekToDays::all(),
        ]);
    }
}
