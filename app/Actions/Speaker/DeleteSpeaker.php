<?php

namespace App\Actions\Speaker;

use App\Models\Speaker;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;

final readonly class DeleteSpeaker
{
    use AsAction;

    public function handle(Speaker $speaker): void
    {
        if ($speaker->photo) {
            Storage::disk('public')->delete($speaker->photo);
        }

        $speaker->delete();
    }
}
