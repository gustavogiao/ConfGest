<?php

namespace App\Actions\Conference;

use App\Models\Conference;
use Lorisleiva\Actions\Concerns\AsAction;

final readonly class DeleteConference
{
    use AsAction;

    public function handle(Conference $conference): void
    {
        $conference->delete();
    }
}
