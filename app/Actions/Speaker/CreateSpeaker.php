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

        return Speaker::create($data);
    }
}
