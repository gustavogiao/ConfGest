<?php

use App\Models\Speaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $speakerType = \App\Models\SpeakerType::factory()->create();
    Speaker::factory()->count(3)->create([
        'speaker_type_id' => $speakerType->id,
    ]);
});

it('lists speakers', function () {
    $response = $this->getJson('/api/speakers', [
        'REMOTE_ADDR' => '127.0.0.1',
    ]);

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => ['id', 'name'/* outros campos do speaker */],
        ],
    ]);
});

it('shows a speaker', function () {
    $speaker = Speaker::first();

    $response = $this->getJson("/api/speakers/{$speaker->id}", [
        'REMOTE_ADDR' => '127.0.0.1',
    ]);

    $response->assertStatus(200);
    $response->assertJsonFragment([
        'id' => $speaker->id,
        'name' => $speaker->name,
    ]);
});

it('denies access for not allowed IP', function () {
    $response = $this->getJson('/api/speakers', [
        'REMOTE_ADDR' => '8.8.8.8',
    ]);

    $response->assertStatus(403);
    $response->assertSee('Acesso não autorizado.');
});
