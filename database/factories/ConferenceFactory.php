<?php

namespace Database\Factories;

use App\Models\Conference;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConferenceFactory extends Factory
{
    protected $model = Conference::class;

    public function definition()
    {
        return [
            'acronym' => strtoupper($this->faker->lexify('CONF-???')),
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'location' => $this->faker->city,
            'conference_date' => $this->faker->dateTimeBetween('+1 week', '+6 months'),
        ];
    }
}
