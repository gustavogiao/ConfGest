<?php

use App\Models\Conference;
use App\Models\Speaker;
use App\Models\SpeakerType;
use App\Models\Sponsor;
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

it('lists conferences', function () {
    Conference::factory()->count(2)->create();
    $this->get(route('admin.conferences.index'))
        ->assertStatus(200)
        ->assertViewIs('admin.conferences.index');
});

it('shows create form', function () {
    $this->get(route('admin.conferences.create'))
        ->assertStatus(200)
        ->assertViewIs('admin.conferences.create');
});

it('creates conference', function () {
    $speakerType = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create([
        'is_active' => true,
        'speaker_type_id' => $speakerType->id,
    ]);
    $sponsor = Sponsor::factory()->create(['is_active' => true]);
    $data = [
        'acronym' => 'ABC',
        'name' => 'Conf Test',
        'description' => 'Desc',
        'location' => 'Local',
        'conference_date' => now()->addDays(10)->format('Y-m-d'),
        'speakers' => [$speaker->id],
        'sponsors' => [$sponsor->id],
    ];
    $this->post(route('admin.conferences.store'), $data)
        ->assertRedirect(route('admin.conferences.index'));
    expect(Conference::where('name', 'Conf Test')->exists())->toBeTrue();
});

it('shows conference details', function () {
    $conference = Conference::factory()->create();
    $this->get(route('admin.conferences.show', $conference))
        ->assertStatus(200)
        ->assertViewIs('conference.show')
        ->assertViewHas('conference', $conference);
});

it('shows edit form', function () {
    $conference = Conference::factory()->create();
    $this->get(route('admin.conferences.edit', $conference))
        ->assertStatus(200)
        ->assertViewIs('admin.conferences.edit');
});

it('updates conference', function () {
    $conference = Conference::factory()->create(['name' => 'Old']);
    $data = [
        'acronym' => $conference->acronym,
        'name' => 'New',
        'description' => $conference->description,
        'location' => $conference->location,
        'conference_date' => $conference->conference_date->format('Y-m-d'),
    ];
    $this->put(route('admin.conferences.update', $conference), $data)
        ->assertRedirect(route('admin.conferences.index'));
    expect($conference->fresh()->name)->toBe('New');
});

it('deletes conference', function () {
    $conference = Conference::factory()->create();
    $this->delete(route('admin.conferences.destroy', $conference))
        ->assertRedirect(route('admin.conferences.index'));
    expect(Conference::find($conference->id))->toBeNull();
});

