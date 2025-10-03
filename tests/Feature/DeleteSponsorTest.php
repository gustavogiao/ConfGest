<?php

use App\Actions\Sponsor\DeleteSponsor;
use App\Models\Sponsor;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

it('deletes sponsor and logo', function () {
    $logo = UploadedFile::fake()->image('logo.jpg')->store('sponsors', 'public');
    $sponsor = Sponsor::factory()->create(['logo' => $logo]);
    expect(Storage::disk('public')->exists($logo))->toBeTrue();

    (new DeleteSponsor)->handle($sponsor);

    expect(Sponsor::find($sponsor->id))->toBeNull();
    expect(Storage::disk('public')->exists($logo))->toBeFalse();
});

it('deletes sponsor without logo', function () {
    $sponsor = Sponsor::factory()->create(['logo' => null]);
    (new DeleteSponsor)->handle($sponsor);

    expect(Sponsor::find($sponsor->id))->toBeNull();
});
