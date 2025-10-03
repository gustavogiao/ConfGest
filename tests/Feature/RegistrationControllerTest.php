<?php

use App\Models\Conference;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('registers successfully', function () {
    $userType = UserType::factory()->create();
    $user = User::factory()->create(['user_type_id' => $userType->id]);
    $conference = Conference::factory()->create();

    $this->actingAs($user)
        ->post(route('conference.register', $conference))
        ->assertRedirect()
        ->assertSessionHas('status', 'Inscrição feita com sucesso!');
});

it('unregisters successfully', function () {
    $userType = UserType::factory()->create();
    $user = User::factory()->create(['user_type_id' => $userType->id]);
    $conference = Conference::factory()->create();

    $this->actingAs($user)
        ->delete(route('conference.unregister', $conference))
        ->assertRedirect()
        ->assertSessionHas('status', 'Inscrição cancelada.');
});
