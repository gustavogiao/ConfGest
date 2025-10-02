<?php

namespace App\Actions\Speaker;

use App\Models\Speaker;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateSpeaker
{
    use AsAction;

    public function handle(array $data, Request $request): Speaker
    {
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('speakers', 'public');
        }

        if (isset($data['social_networks']) && is_string($data['social_networks'])) {
            $data['social_networks'] = array_map('trim', explode(',', $data['social_networks']));
        }

        return Speaker::create($data);
    }
}
