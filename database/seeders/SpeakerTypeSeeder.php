<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpeakerTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('speaker_types')->insert([
            ['description' => 'Keynote', 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Panelist', 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Workshop Leader', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
