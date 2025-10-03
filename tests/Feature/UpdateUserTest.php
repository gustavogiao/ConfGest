<?php

use App\Actions\User\UpdateUser;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Hash;

it('updates user normally', function () {
    $userType = UserType::factory()->create();
    $user = User::factory()->create(['user_type_id' => $userType->id]);
    $data = [
        'firstname' => 'Novo',
        'email' => 'novo@email.com',
    ];
    $updated = (new UpdateUser)->handle($user, $data);

    expect($updated->firstname)->toBe('Novo')
        ->and($updated->email)->toBe('novo@email.com');
});

it('updates user with new encrypted password', function () {
    $userType = UserType::factory()->create();
    $user = User::factory()->create([
        'user_type_id' => $userType->id,
        'password' => bcrypt('oldpass'),
    ]);
    $data = [
        'password' => 'novasenha123',
    ];
    $updated = (new UpdateUser)->handle($user, $data);

    expect(Hash::check('novasenha123', $updated->password))->toBeTrue();
});
