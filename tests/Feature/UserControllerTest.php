<?php

use App\Models\User;
use App\Models\UserType;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $userType = UserType::factory()->create(['description' => 'Admin']);
    $this->user = User::factory()->create([
        'description' => 'Admin',
        'user_type_id' => $userType->id,
    ]);
    $this->actingAs($this->user);
});

it('lista usuários', function () {
    User::factory()->count(2)->create(['user_type_id' => $this->user->user_type_id]);
    $this->get(route('admin.users.index'))
        ->assertStatus(200)
        ->assertViewIs('admin.users.index');
});

it('mostra formulário de criação', function () {
    $this->get(route('admin.users.create'))
        ->assertStatus(200)
        ->assertViewIs('admin.users.create')
        ->assertViewHas('userTypes');
});

it('cria usuário', function () {
    $type = UserType::factory()->create();
    $data = [
        'firstname' => 'Novo',
        'lastname' => 'Usuário',
        'username' => 'novousuario',
        'email' => 'novo@teste.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'description' => 'Descrição',
        'user_type_id' => $type->id,
        'is_active' => true,
    ];
    $this->post(route('admin.users.store'), $data)
        ->assertRedirect(route('admin.users.index'));
    expect(User::where('email', 'novo@teste.com')->exists())->toBeTrue();
});

it('mostra detalhes do usuário', function () {
    $user = User::factory()->create(['user_type_id' => $this->user->user_type_id]);
    $this->get(route('admin.users.show', $user))
        ->assertStatus(200)
        ->assertViewIs('admin.users.show')
        ->assertViewHas('user', $user);
});

it('mostra formulário de edição', function () {
    $user = User::factory()->create(['user_type_id' => $this->user->user_type_id]);
    $this->get(route('admin.users.edit', $user))
        ->assertStatus(200)
        ->assertViewIs('admin.users.edit')
        ->assertViewHas('user', $user)
        ->assertViewHas('userTypes');
});

it('atualiza usuário', function () {
    $type = UserType::factory()->create();
    $user = User::factory()->create(['firstname' => 'Antigo', 'user_type_id' => $type->id, 'is_active' => false]);
    $data = [
        'user_type_id' => $type->id,
        'is_active' => 1,
    ];
    $this->put(route('admin.users.update', $user), $data)
        ->assertRedirect(route('admin.users.index'));
    expect($user->fresh()->is_active)->toBeTrue();
    expect($user->fresh()->user_type_id)->toBe($type->id);
    expect($user->fresh()->firstname)->toBe('Antigo'); // Não muda
});

it('deleta usuário', function () {
    $user = User::factory()->create(['user_type_id' => $this->user->user_type_id]);
    $this->delete(route('admin.users.destroy', $user))
        ->assertRedirect(route('admin.users.index'));
    expect(User::find($user->id))->toBeNull();
});
