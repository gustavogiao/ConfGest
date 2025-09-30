<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\User;
use Illuminate\Database\Seeder;

class ConfParticipantSeeder extends Seeder
{
    public function run()
    {
        $conferences = Conference::all();
        $participants = User::whereHas('type', fn ($q) => $q->where('description', 'Participant'))->get();

        foreach ($conferences as $conference) {
            $max = min($participants->count(), 5);
            if ($max < 2) {
                continue;
            }

            $conference->participants()->attach(
                $participants->random(rand(2, $max))->pluck('id')->toArray(),
                ['registration_date' => now()]
            );
        }

    }
}
