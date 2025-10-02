<?php

use App\Actions\Speaker\CreateSpeaker;
use App\Models\Speaker;
use App\Models\SpeakerType;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
    SpeakerType::factory()->create(['id' => 1]);
});

it('cria um speaker normalmente', function () {
    $data = [
        'name' => 'John Doe',
        'affiliation' => 'Acme',
        'biography' => 'Bio',
        'speaker_type_id' => 1,
        'is_active' => true,
    ];
    $request = Request::create('/', 'POST', $data);
    $speaker = (new CreateSpeaker)->handle($data, $request);

    expect($speaker)->toBeInstanceOf(Speaker::class)
        ->and($speaker->name)->toBe('John Doe');
});

it('cria um speaker com foto', function () {
    $data = [
        'name' => 'Jane Doe',
        'affiliation' => 'Acme',
        'biography' => 'Bio',
        'speaker_type_id' => 1,
        'is_active' => true,
    ];
    $file = UploadedFile::fake()->image('photo.jpg');
    $request = Request::create('/', 'POST', $data, [], ['photo' => $file]);
    $speaker = (new CreateSpeaker)->handle($data, $request);

    expect($speaker->photo)->toStartWith('speakers/');
    Storage::disk('public')->assertExists($speaker->photo);
});

it('cria um speaker com social_networks como string', function () {
    $data = [
        'name' => 'Alice',
        'affiliation' => 'Acme',
        'biography' => 'Bio',
        'speaker_type_id' => 1,
        'is_active' => true,
        'social_networks' => 'twitter, linkedin',
    ];
    $request = Request::create('/', 'POST', $data);
    $speaker = (new CreateSpeaker)->handle($data, $request);

    expect($speaker->social_networks)->toBeArray()
        ->and($speaker->social_networks)->toContain('twitter');
});

it('cria um speaker sem social_networks', function () {
    $data = [
        'name' => 'Bob',
        'affiliation' => 'Acme',
        'biography' => 'Bio',
        'speaker_type_id' => 1,
        'is_active' => true,
    ];
    $request = Request::create('/', 'POST', $data);
    $speaker = (new CreateSpeaker)->handle($data, $request);

    expect($speaker->social_networks)->toBeNull();
});

it('cria um speaker sem foto', function () {
    $data = [
        'name' => 'Eve',
        'affiliation' => 'Acme',
        'biography' => 'Bio',
        'speaker_type_id' => 1,
        'is_active' => true,
    ];
    $request = Request::create('/', 'POST', $data);
    $speaker = (new CreateSpeaker)->handle($data, $request);

    expect($speaker->photo)->toBeNull();
});
