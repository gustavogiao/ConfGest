<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sponsor;
use App\Models\Conference;

class ConfSponsorSeeder extends Seeder
{
    public function run()
    {
        $conferences = Conference::all();
        $sponsors = Sponsor::all();

        foreach ($conferences as $conference) {
            $conference->sponsors()->attach(
                $sponsors->random(rand(1, 2))->pluck('id')->toArray()
            );
        }
    }
}

