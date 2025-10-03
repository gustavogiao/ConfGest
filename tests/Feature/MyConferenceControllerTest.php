<?php

use App\Models\Conference;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows user upcoming and past conferences', function () {
    $userType = UserType::factory()->create();
    $user = User::factory()->create(['user_type_id' => $userType->id]);

    $futureConference = Conference::factory()->create([
        'conference_date' => now()->addDays(5),
    ]);
    $pastConference = Conference::factory()->create([
        'conference_date' => now()->subDays(5),
    ]);

    $user->conferences()->attach([$futureConference->id, $pastConference->id]);

    $this->actingAs($user)
        ->get(route('my.conferences'))
        ->assertStatus(200)
        ->assertViewHas('upcoming', function ($confs) use ($futureConference) {
            return $confs->contains($futureConference);
        })
        ->assertViewHas('past', function ($confs) use ($pastConference) {
            return $confs->contains($pastConference);
        });
});

it('shows conference details', function () {
    $userType = UserType::factory()->create();
    $user = User::factory()->create(['user_type_id' => $userType->id]);
    $conference = Conference::factory()->create();

    $this->actingAs($user)
        ->get(route('conference.show', $conference))
        ->assertStatus(200)
        ->assertViewIs('conference.show')
        ->assertViewHas('conference', $conference);
});
