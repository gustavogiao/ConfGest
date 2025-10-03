<?php

use App\Actions\Speaker\UpdateSpeaker;
use App\Models\Speaker;
use App\Models\SpeakerType;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
    SpeakerType::factory()->create(['id' => 1]);
});

it('updates speaker normally', function () {
    $speaker = Speaker::factory()->create(['speaker_type_id' => 1]);
    $data = [
        'name' => 'Novo Nome',
        'affiliation' => 'Nova Empresa',
        'biography' => 'Nova Bio',
        'is_active' => false,
    ];
    $request = Request::create('/', 'POST', $data);
    $updated = (new UpdateSpeaker)->handle($speaker, $request, $data);

    expect($updated->name)->toBe('Novo Nome')
        ->and($updated->is_active)->toBeFalse();
});

it('updates speaker with new photo and deletes old one', function () {
    $oldPhoto = UploadedFile::fake()->image('old.jpg')->store('speakers', 'public');
    $speaker = Speaker::factory()->create([
        'photo' => $oldPhoto,
        'speaker_type_id' => 1,
    ]);
    $newFile = UploadedFile::fake()->image('new.jpg');
    $data = [];
    $request = Request::create('/', 'POST', $data, [], ['photo' => $newFile]);
    $updated = (new UpdateSpeaker)->handle($speaker, $request, $data);

    expect($updated->photo)->toStartWith('speakers/')
        ->and(Storage::disk('public')->exists($updated->photo))->toBeTrue()
        ->and(Storage::disk('public')->exists($oldPhoto))->toBeFalse();
});

it('updates speaker with social_networks as string', function () {
    $speaker = Speaker::factory()->create(['speaker_type_id' => 1]);
    $data = [
        'social_networks' => 'twitter, linkedin',
    ];
    $request = Request::create('/', 'POST', $data);
    $updated = (new UpdateSpeaker)->handle($speaker, $request, $data);

    expect($updated->social_networks)->toBeArray()
        ->and($updated->social_networks)->toContain('twitter');
});

it('updates speaker without photo', function () {
    $speaker = Speaker::factory()->create(['speaker_type_id' => 1, 'photo' => null]);
    $data = ['name' => 'Sem Foto'];
    $request = Request::create('/', 'POST', $data);
    $updated = (new UpdateSpeaker)->handle($speaker, $request, $data);

    expect($updated->photo)->toBeNull();
});

it('updates speaker without social_networks', function () {
    $speaker = Speaker::factory()->create(['speaker_type_id' => 1, 'social_networks' => null]);
    $data = ['name' => 'Sem Social'];
    $request = Request::create('/', 'POST', $data);
    $updated = (new UpdateSpeaker)->handle($speaker, $request, $data);

    expect($updated->social_networks)->toBeNull();
});
