<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_types')->insert([
            ['description' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Participant', 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Speaker', 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Sponsor', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
