<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\View\View;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $conferences = Conference::with(['speakers', 'sponsors'])->get();
        return view('conference.index', compact('conferences'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Conference $conference): View
    {
        $conference->load(['speakers.type', 'sponsors', 'participants']);
        return view('conference.show', compact('conference'));
    }
}
