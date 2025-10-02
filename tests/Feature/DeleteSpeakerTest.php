<?php

use App\Actions\Speaker\DeleteSpeaker;
use App\Models\Speaker;
use App\Models\SpeakerType;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
    SpeakerType::factory()->create(['id' => 1]);
});

it('deleta speaker e foto', function () {
    $photo = UploadedFile::fake()->image('photo.jpg')->store('speakers', 'public');
    $speaker = Speaker::factory()->create([
        'photo' => $photo,
        'speaker_type_id' => 1,
    ]);
    expect(Storage::disk('public')->exists($photo))->toBeTrue();

    (new DeleteSpeaker)->handle($speaker);

    expect(Speaker::find($speaker->id))->toBeNull();
    expect(Storage::disk('public')->exists($photo))->toBeFalse();
});

it('deleta speaker sem foto', function () {
    $speaker = Speaker::factory()->create([
        'photo' => null,
        'speaker_type_id' => 1,
    ]);
    (new DeleteSpeaker)->handle($speaker);

    expect(Speaker::find($speaker->id))->toBeNull();
});
