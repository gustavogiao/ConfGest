<?php

namespace App\Actions\Sponsor;

use App\Models\Sponsor;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;

final readonly class DeleteSponsor
{
    use AsAction;

    public function handle(Sponsor $sponsor): void
    {
        if ($sponsor->logo) {
            Storage::disk('public')->delete($sponsor->logo);
        }

        $sponsor->delete();
    }
}
