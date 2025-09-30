<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Speaker;
use Illuminate\Database\Seeder;

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
