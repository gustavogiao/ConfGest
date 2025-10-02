<?php

use App\Models\User;
use App\Models\UserType;

it('permite acesso para admin', function () {
    $type = UserType::factory()->create(['description' => 'Admin']);
    $admin = User::factory()->create(['user_type_id' => $type->id]);
    $this->actingAs($admin);

    $response = $this->get('/admin/speakers');
    $response->assertStatus(200);
});

it('nega acesso para não admin', function () {
    $type = UserType::factory()->create(['description' => 'User']);
    $user = User::factory()->create(['user_type_id' => $type->id]);
    $this->actingAs($user);

    $response = $this->get('/admin/speakers');
    $response->assertStatus(403);
});

it('nega acesso para usuário não autenticado', function () {
    $response = $this->withoutMiddleware(\Illuminate\Auth\Middleware\Authenticate::class)
        ->get('/admin/speakers');
    $response->assertStatus(403);
});

it('nega acesso para usuário autenticado sem tipo', function () {
    $type = UserType::factory()->create(['description' => 'Participant']);
    $user = User::factory()->create(['user_type_id' => $type->id]);
    $user->type()->dissociate(); // Remove a relação, se necessário
    $this->actingAs($user);

    $response = $this->get('/admin/speakers');
    $response->assertStatus(403);
});
