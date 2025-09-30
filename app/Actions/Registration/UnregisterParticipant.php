<?php

namespace App\Actions\Registration;

use App\Models\Conference;
use Lorisleiva\Actions\Concerns\AsAction;

class UnregisterParticipant
{
    use AsAction;

    public function handle(Conference $conference): void
    {
        $conference->participants()->detach(auth()->id());
    }
}
