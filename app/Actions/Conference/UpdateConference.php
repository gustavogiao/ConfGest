<?php

namespace App\Actions\Conference;

use App\Models\Conference;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateConference
{
    use AsAction;

    public function handle(Conference $conference, Request $request): Conference
    {
        $data = $request->validated();

        if (isset($data['speakers'])) {
            $conference->speakers()->sync($data['speakers']);
        } else {
            $conference->speakers()->detach();
        }

        if (isset($data['sponsors'])) {
            $conference->sponsors()->sync($data['sponsors']);
        } else {
            $conference->sponsors()->detach();
        }

        $conference->update($data);

        return $conference;
    }
}
