<?php

namespace Database\Factories;

use App\Models\Speaker;
use App\Models\SpeakerType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpeakerFactory extends Factory
{
    protected $model = Speaker::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'affiliation' => $this->faker->company,
            'biography' => $this->faker->paragraph,
            'photo' => null,
            'social_networks' => ['twitter' => $this->faker->url],
            'page_link' => $this->faker->url,
            'speaker_type_id' => SpeakerType::inRandomOrder()->first()->id ?? 1,
            'is_active' => true,
        ];
    }
}
