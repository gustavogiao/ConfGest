<?php

namespace App\Actions\Speaker;

use App\Models\Speaker;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateSpeaker
{
    use AsAction;

    public function handle(Speaker $speaker, Request $request, array $data): Speaker
    {
        if ($request->hasFile('photo')) {
            if ($speaker->photo) {
                \Storage::disk('public')->delete($speaker->photo);
            }
            $data['photo'] = $request->file('photo')->store('speakers', 'public');
        }

        if (isset($data['social_networks']) && is_string($data['social_networks'])) {
            $data['social_networks'] = array_map('trim', explode(',', $data['social_networks']));
        }

        $speaker->update($data);

        return $speaker;
    }

}
