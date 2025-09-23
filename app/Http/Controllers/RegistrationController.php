<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\RedirectResponse;

class RegistrationController extends Controller
{
    public function store(Conference $conference): RedirectResponse
    {
        $conference->participants()->attach(auth()->id(), [
            'registration_date' => now(),
        ]);

        return back()->with('status', 'Inscrição feita com sucesso!');
    }

    public function destroy(Conference $conference): RedirectResponse
    {
        $conference->participants()->detach(auth()->id());

        return back()->with('status', 'Inscrição cancelada.');
    }
}
