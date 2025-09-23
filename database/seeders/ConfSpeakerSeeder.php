<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speaker;
use App\Models\Conference;

class ConfSpeakerSeeder extends Seeder
{
    public function run()
    {
        $conferences = Conference::all();
        $speakers = Speaker::all();

        foreach ($conferences as $conference) {
            $conference->speakers()->attach(
                $speakers->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}


