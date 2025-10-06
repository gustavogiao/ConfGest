<?php

namespace App\Actions\Conference;

use App\Models\Conference;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateConference
{
    use AsAction;

    public function handle(array $data): Conference
    {
        $conference = Conference::create($data);

        if (isset($data['speakers'])) {
            $conference->speakers()->sync($data['speakers']);
        }

        if (isset($data['sponsors'])) {
            $conference->sponsors()->sync($data['sponsors']);
        }

        return $conference;
    }
}
