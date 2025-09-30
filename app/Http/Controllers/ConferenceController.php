<?php

namespace App\Http\Controllers;

use App\Actions\Conference\FilterConferences;
use App\Actions\Conference\LoadConferenceRelations;
use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, FilterConferences $action): View
    {
        $conferences = $action->handle($request);
        return view('conference.index', compact('conferences'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference, LoadConferenceRelations $action): View
    {
        $conference = $action->handle($conference);
        return view('conference.show', compact('conference'));
    }
}
