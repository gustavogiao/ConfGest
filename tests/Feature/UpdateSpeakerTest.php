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

it('atualiza speaker normalmente', function () {
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

it('atualiza speaker com nova foto e deleta antiga', function () {
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

it('atualiza speaker com social_networks como string', function () {
    $speaker = Speaker::factory()->create(['speaker_type_id' => 1]);
    $data = [
        'social_networks' => 'twitter, linkedin',
    ];
    $request = Request::create('/', 'POST', $data);
    $updated = (new UpdateSpeaker)->handle($speaker, $request, $data);

    expect($updated->social_networks)->toBeArray()
        ->and($updated->social_networks)->toContain('twitter');
});

it('atualiza speaker sem foto', function () {
    $speaker = Speaker::factory()->create(['speaker_type_id' => 1, 'photo' => null]);
    $data = ['name' => 'Sem Foto'];
    $request = Request::create('/', 'POST', $data);
    $updated = (new UpdateSpeaker)->handle($speaker, $request, $data);

    expect($updated->photo)->toBeNull();
});

it('atualiza speaker sem social_networks', function () {
    $speaker = Speaker::factory()->create(['speaker_type_id' => 1, 'social_networks' => null]);
    $data = ['name' => 'Sem Social'];
    $request = Request::create('/', 'POST', $data);
    $updated = (new UpdateSpeaker)->handle($speaker, $request, $data);

    expect($updated->social_networks)->toBeNull();
});
