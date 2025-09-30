<?php

namespace App\Http\Controllers;

use App\Actions\Registration\RegisterParticipant;
use App\Actions\Registration\UnregisterParticipant;
use App\Models\Conference;
use Illuminate\Http\RedirectResponse;

class RegistrationController extends Controller
{
    public function store(Conference $conference, RegisterParticipant $action): RedirectResponse
    {
        $action->handle($conference);

        return back()->with('status', 'Inscrição feita com sucesso!');
    }

    public function destroy(Conference $conference, UnregisterParticipant $action): RedirectResponse
    {
        $action->handle($conference);

        return back()->with('status', 'Inscrição cancelada.');
    }
}
