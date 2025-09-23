<?php

namespace Database\Factories;

use App\Models\Sponsor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SponsorFactory extends Factory
{
    protected $model = Sponsor::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'logo' => null,
            'category' => $this->faker->randomElement(['Gold','Silver','Bronze']),
            'is_active' => true,
        ];
    }
}

