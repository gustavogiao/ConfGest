<?php

use App\Models\Speaker;
use App\Models\SpeakerType;
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

it('has speaker page', function () {
    $response = $this->get('/admin/speakers');
    $response->assertStatus(200);
});

it('cria um speaker', function () {
    $type = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create([
        'speaker_type_id' => $type->id,
        'name' => 'John Doe',
    ]);
    expect(Speaker::find($speaker->id)->name)->toBe('John Doe');
});

it('relaciona speaker ao speaker type', function () {
    $type = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create(['speaker_type_id' => $type->id]);
    expect($speaker->type->id)->toBe($type->id);
});

it('retorna display status correto', function () {
    $type = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create(['speaker_type_id' => $type->id, 'is_active' => true]);
    expect($speaker->display_status)->toBe('Active');

    $speaker->is_active = false;
    $speaker->save();
    expect($speaker->display_status)->toBe('Inactive');
});

it('retorna status class correto', function () {
    $type = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create(['speaker_type_id' => $type->id, 'is_active' => true]);
    expect($speaker->status_class)->toBe('text-green-600 dark:text-green-400');

    $speaker->is_active = false;
    $speaker->save();
    expect($speaker->status_class)->toBe('text-red-600 dark:text-red-400');
});

it('relaciona conferences ao speaker', function () {
    $type = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create(['speaker_type_id' => $type->id]);
    $conference = \App\Models\Conference::factory()->create();
    $speaker->conferences()->attach($conference->id);

    expect($speaker->conferences)->toHaveCount(1);
    expect($speaker->conferences->first()->id)->toBe($conference->id);
});
