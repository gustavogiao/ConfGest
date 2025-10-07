<?php

namespace App\Actions\Sponsor;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

final readonly class CreateSponsor
{
    use AsAction;

    public function handle(array $data, Request $request): Sponsor
    {
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('sponsors', 'public');
        }

        return Sponsor::create($data);
    }
}
