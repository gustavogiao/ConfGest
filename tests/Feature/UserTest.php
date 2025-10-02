<?php

use App\Models\Conference;
use App\Models\User;
use App\Models\UserType;

it('returns the user type', function () {
    $type = UserType::factory()->create();
    $user = User::factory()->create(['user_type_id' => $type->id]);
    expect($user->type->id)->toBe($type->id);
});

it('returns user conferences', function () {
    $type = UserType::factory()->create();
    $user = User::factory()->create(['user_type_id' => $type->id]);
    $conference = Conference::factory()->create();
    $user->conferences()->attach($conference->id, ['registration_date' => now()]);
    expect($user->conferences)->toHaveCount(1);
    expect($user->conferences->first()->id)->toBe($conference->id);
});

it('returns correct display status', function () {
    $user = User::factory()->make(['is_active' => true]);
    expect($user->display_status)->toBe('Active');
    $user = User::factory()->make(['is_active' => false]);
    expect($user->display_status)->toBe('Inactive');
});

it('returns correct status class', function () {
    $user = User::factory()->make(['is_active' => true]);
    expect($user->status_class)->toBe('text-green-600 dark:text-green-400');
    $user = User::factory()->make(['is_active' => false]);
    expect($user->status_class)->toBe('text-red-600 dark:text-red-400');
});
