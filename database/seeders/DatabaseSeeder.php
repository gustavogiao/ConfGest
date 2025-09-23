<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Conference;
use App\Models\Speaker;
use App\Models\Sponsor;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserTypeSeeder::class,
            SpeakerTypeSeeder::class,
        ]);

        // Criar entidades base
        User::factory(10)->create();
        Conference::factory(5)->create();
        Speaker::factory(8)->create();
        Sponsor::factory(6)->create();

        // Criar associações
        $this->call([
            ConfParticipantSeeder::class,
            ConfSpeakerSeeder::class,
            ConfSponsorSeeder::class,
        ]);
    }
}

