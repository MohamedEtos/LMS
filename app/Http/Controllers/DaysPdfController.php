<?php

namespace App\Http\Controllers;

use App\Models\daysPdf;
use App\Models\WeekToDays;
use Illuminate\Http\Request;

class DaysPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pdfs.read', [
            'pdfs' => daysPdf::with('daysPdfRel')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pdfs.create', [
            'days' => WeekToDays::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pdfName' => ['required', 'string'],
            'pdfLink' => ['required', 'url'],
            'dayId' => ['required', 'exists:week_to_days,id'],
        ]);

        daysPdf::create($validateData);

        return to_route('pdf.index', [
            'pdfs' => daysPdf::with('daysPdfRel')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(daysPdf $daysPdf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($daysPdf)
    {
        return view('pdfs.update', [
            'pdf' => daysPdf::find($daysPdf),
            'days' => WeekToDays::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $daysPdf)
    {
        $request->validate([
            'pdfName' => ['required', 'string'],
            'pdfLink' => ['required', 'url'],
            'dayId' => ['required', 'exists:week_to_days,id'],
        ]);

        $pdf = daysPdf::find($daysPdf);
        $pdf->pdfName = $request->pdfName;
        $pdf->pdfLink = $request->pdfLink;
        $pdf->dayId = $request->dayId;
        $pdf->save();

        return to_route('pdf.index', [
            'pdfs' => daysPdf::with('daysPdfRel')->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($daysPdf)
    {
        daysPdf::findOrFail($daysPdf)->delete();

        return to_route('pdf.index', [
            'pdfs' => daysPdf::with('daysPdfRel')->get(),
        ]);
    }
}
