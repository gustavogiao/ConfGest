<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar tipos
        $adminType = UserType::where('description', 'Admin')->first();
        $participantType = UserType::where('description', 'Participant')->first();
        $speakerManagerType = UserType::where('description', 'Speaker')->first();
        $sponsorManagerType = UserType::where('description', 'Sponsor')->first();

        // Criar utilizadores fixos
        User::create([
            'firstname' => 'System',
            'lastname' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@confgest.test',
            'password' => Hash::make('password'),
            'user_type_id' => $adminType->id,
            'is_active' => true,
        ]);

        User::create([
            'firstname' => 'Default',
            'lastname' => 'Participant',
            'username' => 'participant',
            'email' => 'participant@confgest.test',
            'password' => Hash::make('password'),
            'user_type_id' => $participantType->id,
            'is_active' => true,
        ]);

        User::create([
            'firstname' => 'Speaker',
            'lastname' => 'Manager',
            'username' => 'speakermanager',
            'email' => 'speaker@confgest.test',
            'password' => Hash::make('password'),
            'user_type_id' => $speakerManagerType->id,
            'is_active' => true,
        ]);

        User::create([
            'firstname' => 'Sponsor',
            'lastname' => 'Manager',
            'username' => 'sponsormanager',
            'email' => 'sponsor@confgest.test',
            'password' => Hash::make('password'),
            'user_type_id' => $sponsorManagerType->id,
            'is_active' => true,
        ]);

        User::factory(10)->create([
            'user_type_id' => $participantType->id,
            'is_active' => true,
        ]);

    }
}
