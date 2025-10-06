<?php

use App\Models\Conference;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('relates participants to conference', function () {
    $userType = UserType::factory()->create();
    $conference = Conference::factory()->create();
    $user = User::factory()->create(['user_type_id' => $userType->id]);
    $conference->participants()->attach($user->id, ['registration_date' => now()]);
    expect($conference->participants)->toHaveCount(1);
    expect($conference->participants->first()->id)->toBe($user->id);
    expect($conference->participants->first()->pivot->registration_date)->not->toBeNull();
});

it('casts conference_date correctly', function () {
    $conference = Conference::factory()->create(['conference_date' => '2024-07-01']);
    expect($conference->conference_date)->toBeInstanceOf(\Illuminate\Support\Carbon::class);
    expect($conference->conference_date->format('Y-m-d'))->toBe('2024-07-01');
});
