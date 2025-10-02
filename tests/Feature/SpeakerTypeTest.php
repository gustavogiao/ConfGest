<?php

use App\Models\Speaker;
use App\Models\SpeakerType;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('cria um speaker type', function () {
    $type = SpeakerType::factory()->create(['description' => 'Keynote']);
    expect(SpeakerType::find($type->id)->description)->toBe('Keynote');
});

it('relaciona speakers ao speaker type', function () {
    $type = SpeakerType::factory()->create();
    $speaker = Speaker::factory()->create(['speaker_type_id' => $type->id]);
    expect($type->speakers)->toHaveCount(1);
    expect($type->speakers->first()->id)->toBe($speaker->id);
});
