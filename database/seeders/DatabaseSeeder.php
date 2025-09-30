<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Speaker;
use App\Models\Sponsor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserTypeSeeder::class,
            SpeakerTypeSeeder::class,
            UserSeeder::class,
        ]);

        // Cria entidades com factories
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
