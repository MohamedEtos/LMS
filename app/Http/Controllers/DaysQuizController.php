<?php

namespace App\Http\Controllers;

use App\Models\daysQuiz;
use App\Models\WeekToDays;
use Illuminate\Http\Request;

class DaysQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('quizzes.read', [
            'quizzes' => daysQuiz::with('daysQuizRel')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quizzes.create', [
            'days' => WeekToDays::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'quizName' => ['required', 'string'],
            'quizContent' => ['required', 'string'],
            'dayId' => ['required', 'exists:week_to_days,id'],
        ]);

        daysQuiz::create($validateData);

        return to_route('quiz.index', [
            'quizzes' => daysQuiz::with('daysQuizRel')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(daysQuiz $daysQuiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($daysQuiz)
    {
        return view('quizzes.update', [
            'quiz' => daysQuiz::find($daysQuiz),
            'days' => WeekToDays::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $daysQuiz)
    {
        $request->validate([
            'quizName' => ['required', 'string'],
            'quizContent' => ['required', 'string'],
            'dayId' => ['required', 'exists:week_to_days,id'],
        ]);

        $quiz = daysQuiz::find($daysQuiz);
        $quiz->quizName = $request->quizName;
        $quiz->quizContent = $request->quizContent;
        $quiz->dayId = $request->dayId;
        $quiz->save();

        return to_route('quiz.index', [
            'quizzes' => daysQuiz::with('daysQuizRel')->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($daysQuiz)
    {
        daysQuiz::find($daysQuiz)->delete();

        return view('quizzes.read', [
            'quizzes' => daysQuiz::with('daysQuizRel')->get(),
        ]);
    }
}
