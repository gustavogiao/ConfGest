<?php

use App\Models\User;
use App\Models\UserType;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a user type', function () {
    $type = UserType::factory()->create(['description' => 'Speaker']);
    expect(UserType::find($type->id)->description)->toBe('Speaker');
});

it('relates users to user type', function () {
    $type = UserType::factory()->create();
    $user = User::factory()->create(['user_type_id' => $type->id]);
    expect($type->users)->toHaveCount(1);
    expect($type->users->first()->id)->toBe($user->id);
});
