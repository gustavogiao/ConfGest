<?php

namespace App\Actions\Registration;

use App\Models\Conference;
use Lorisleiva\Actions\Concerns\AsAction;

final readonly class RegisterParticipant
{
    use AsAction;

    public function handle(Conference $conference): void
    {
        $conference->participants()->attach(auth()->id(), [
            'registration_date' => now(),
        ]);
    }
}
