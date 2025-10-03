<?php

use App\Actions\Sponsor\UpdateSponsor;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

it('updates sponsor normally', function () {
    $sponsor = Sponsor::factory()->create();
    $data = [
        'name' => 'Novo Nome',
    ];
    $request = Request::create('/', 'POST', $data);
    $updated = (new UpdateSponsor)->handle($sponsor, $request, $data);

    expect($updated->name)->toBe('Novo Nome');
});

it('updates sponsor with new logo and deletes old one', function () {
    $oldLogo = UploadedFile::fake()->image('old.jpg')->store('sponsors', 'public');
    $sponsor = Sponsor::factory()->create(['logo' => $oldLogo]);
    $newFile = UploadedFile::fake()->image('new.jpg');
    $data = [];
    $request = Request::create('/', 'POST', $data, [], ['logo' => $newFile]);
    $updated = (new UpdateSponsor)->handle($sponsor, $request, $data);

    expect($updated->logo)->toStartWith('sponsors/')
        ->and(Storage::disk('public')->exists($updated->logo))->toBeTrue()
        ->and(Storage::disk('public')->exists($oldLogo))->toBeFalse();
});

it('updates sponsor without logo', function () {
    $sponsor = Sponsor::factory()->create(['logo' => null]);
    $data = ['name' => 'Sem Logo'];
    $request = Request::create('/', 'POST', $data);
    $updated = (new UpdateSponsor)->handle($sponsor, $request, $data);

    expect($updated->logo)->toBeNull();
});
