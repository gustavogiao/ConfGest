<?php

use App\Models\Speaker;
use App\Models\SpeakerType;
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

it('lists speakers', function () {
    $type = SpeakerType::factory()->create();
    Speaker::factory()->count(2)->create(['speaker_type_id' => $type->id]);
    $this->get(route('admin.speakers.index'))
        ->assertStatus(200)
        ->assertViewIs('admin.speakers.index');
});

it('creates speaker', function () {
    $type = SpeakerType::factory()->create();
    $data = [
        'name' => 'Fulano',
        'affiliation' => 'Empresa',
        'biography' => 'Bio',
        'photo' => null,
        'social_networks' => json_encode(['twitter' => 'https://twitter.com/fulano']),
        'page_link' => 'https://site.com',
        'speaker_type_id' => $type->id,
        'is_active' => true,
    ];
    $this->post(route('admin.speakers.store'), $data)
        ->assertRedirect(route('admin.speakers.index'));
    expect(Speaker::where('name', 'Fulano')->exists())->toBeTrue();
});

it('shows speaker details', function () {
    $type = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create(['speaker_type_id' => $type->id]);
    $this->get(route('admin.speakers.show', $speaker))
        ->assertStatus(200)
        ->assertViewIs('admin.speakers.show')
        ->assertViewHas('speaker', $speaker);
});

it('shows create form', function () {
    $this->get(route('admin.speakers.create'))
        ->assertStatus(200)
        ->assertViewIs('admin.speakers.create');
});

it('shows edit form', function () {
    $type = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create(['speaker_type_id' => $type->id]);
    $this->get(route('admin.speakers.edit', $speaker))
        ->assertStatus(200)
        ->assertViewIs('admin.speakers.edit');
});

it('updates speaker', function () {
    $type = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create(['name' => 'Antigo', 'speaker_type_id' => $type->id]);
    $data = [
        'name' => 'Novo',
        'affiliation' => $speaker->affiliation,
        'biography' => $speaker->biography,
        'photo' => $speaker->photo,
        'social_networks' => json_encode($speaker->social_networks),
        'page_link' => $speaker->page_link,
        'speaker_type_id' => $type->id,
        'is_active' => true,
    ];
    $this->put(route('admin.speakers.update', $speaker), $data)
        ->assertRedirect(route('admin.speakers.index'));
    expect($speaker->fresh()->name)->toBe('Novo');
});

it('deletes speaker', function () {
    $type = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create(['speaker_type_id' => $type->id]);
    $this->delete(route('admin.speakers.destroy', $speaker))
        ->assertRedirect(route('admin.speakers.index'));
    expect(Speaker::find($speaker->id))->toBeNull();
});
