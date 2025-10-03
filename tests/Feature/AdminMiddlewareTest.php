<?php

use App\Models\User;
use App\Models\UserType;

it('permits access to admin', function () {
    $type = UserType::factory()->create(['description' => 'Admin']);
    $admin = User::factory()->create(['user_type_id' => $type->id]);
    $this->actingAs($admin);

    $response = $this->get('/admin/speakers');
    $response->assertStatus(200);
});

it('denies access to non-admin', function () {
    $type = UserType::factory()->create(['description' => 'User']);
    $user = User::factory()->create(['user_type_id' => $type->id]);
    $this->actingAs($user);

    $response = $this->get('/admin/speakers');
    $response->assertStatus(403);
});

it('denies access to unauthenticated user', function () {
    $response = $this->withoutMiddleware(\Illuminate\Auth\Middleware\Authenticate::class)
        ->get('/admin/speakers');
    $response->assertStatus(403);
});

it('denies access to authenticated user without type', function () {
    $type = UserType::factory()->create(['description' => 'Participant']);
    $user = User::factory()->create(['user_type_id' => $type->id]);
    $user->type()->dissociate(); // Remove the relation, if necessary
    $this->actingAs($user);

    $response = $this->get('/admin/speakers');
    $response->assertStatus(403);
});
