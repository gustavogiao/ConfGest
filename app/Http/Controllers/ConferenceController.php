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
        $conferences = Conference::with([
            'speakers',
            'sponsors',
        ])->orderByDesc('conference_date')->paginate(4);

        return view('conference.index', compact('conferences'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference): View
    {
        $conference->load([
            'speakers' => function ($query) {
                $query->where('is_active', true)->with('type');
            },
            'sponsors' => function ($query) {
                $query->where('is_active', true);
            },
            'participants',
        ]);

        return view('conference.show', compact('conference'));
    }
}
