<?php

namespace App\Actions\Sponsor;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateSponsor
{
    use AsAction;

    public function handle(Sponsor $sponsor, Request $request, array $data): Sponsor
    {
        if ($request->hasFile('logo')) {
            if ($sponsor->logo) {
                \Storage::disk('public')->delete($sponsor->logo);
            }
            $data['logo'] = $request->file('logo')->store('sponsors', 'public');
        }

        $sponsor->update($data);

        return $sponsor;
    }
}
