<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyConferenceController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        // Conferências futuras (ainda por acontecer)
        $upcoming = $user->conferences()
            ->where('conference_date', '>=', now())
            ->orderBy('conference_date', 'asc')
            ->get();

        // Conferências passadas
        $past = $user->conferences()
            ->where('conference_date', '<', now())
            ->orderBy('conference_date', 'desc')
            ->get();

        return view('conference.my', compact('upcoming', 'past'));
    }
}

