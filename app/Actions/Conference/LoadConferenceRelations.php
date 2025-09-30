<?php

namespace App\Actions\Conference;

use App\Models\Conference;

class LoadConferenceRelations
{
    public function handle(Conference $conference): Conference
    {
        $conference->load([
            'speakers' => function ($query) {
                $query->where('is_active', true)->with('type');
            },
            'sponsors' => function ($query) {
                $query->where('is_active', true);
            },
            'participants',
        ]);

        return $conference;
    }
}
