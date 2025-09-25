<?php

use App\Models\Sponsor;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $userType = UserType::factory()->create(['description' => 'Admin']);
    $user = User::factory()->create([
        'description' => 'Admin',
        'user_type_id' => $userType->id,
    ]);
    $this->actingAs($user);
});

it('cria um sponsor', function () {
    $data = [
        'name' => 'Patrocinador Teste',
        'category' => 'Bronze',
        'is_active' => true,
    ];

    $response = $this->post(route('admin.sponsors.store'), $data);

    $response->assertRedirect(route('admin.sponsors.index'));
    $this->assertDatabaseHas('sponsors', ['name' => 'Patrocinador Teste']);
});

it('lista sponsors', function () {
    Sponsor::factory()->count(3)->create();

    $response = $this->get(route('admin.sponsors.index'));

    $response->assertOk();
    $response->assertViewIs('admin.sponsors.index');
});

it('visualiza um sponsor', function () {
    $sponsor = Sponsor::factory()->create();

    $response = $this->get(route('admin.sponsors.show', $sponsor));

    $response->assertOk();
    $response->assertViewIs('admin.sponsors.show');
    $response->assertViewHas('sponsor', $sponsor);
});

it('atualiza um sponsor', function () {
    $sponsor = Sponsor::factory()->create();
    $data = ['name' => 'Novo Nome', 'category' => $sponsor->category, 'is_active' => $sponsor->is_active];

    $response = $this->put(route('admin.sponsors.update', $sponsor), $data);

    $response->assertRedirect(route('admin.sponsors.index'));
    $this->assertDatabaseHas('sponsors', ['name' => 'Novo Nome']);
});

it('apaga um sponsor', function () {
    $sponsor = Sponsor::factory()->create();

    $response = $this->delete(route('admin.sponsors.destroy', $sponsor));

    $response->assertRedirect(route('admin.sponsors.index'));
    $this->assertDatabaseMissing('sponsors', ['id' => $sponsor->id]);
});
