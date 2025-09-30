<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'username' => $this->faker->unique()->userName,
            'user_type_id' => UserType::inRandomOrder()->first()->id ?? 2, // Participant default
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'description' => $this->faker->sentence,
            'last_login' => now(),
            'is_active' => true,
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
