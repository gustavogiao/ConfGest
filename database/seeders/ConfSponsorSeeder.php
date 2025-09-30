<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Sponsor;
use Illuminate\Database\Seeder;

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
