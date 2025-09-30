<?php

namespace Database\Factories;

use App\Models\SpeakerType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpeakerTypeFactory extends Factory
{
    protected $model = SpeakerType::class;

    public function definition()
    {
        return [
            'description' => $this->faker->randomElement(['Keynote', 'Panelist', 'Workshop Leader']),
        ];
    }
}
