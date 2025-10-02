<?php

use App\Actions\Sponsor\CreateSponsor;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

it('cria sponsor normalmente', function () {
    $data = [
        'name' => 'Empresa X',
        'website' => 'https://empresax.com',
    ];
    $request = Request::create('/', 'POST', $data);
    $sponsor = (new CreateSponsor)->handle($data, $request);

    expect($sponsor->name)->toBe('Empresa X')
        ->and($sponsor->logo)->toBeNull();
});

it('cria sponsor com logo', function () {
    $data = [
        'name' => 'Empresa Y',
        'website' => 'https://empresay.com',
    ];
    $file = UploadedFile::fake()->image('logo.jpg');
    $request = Request::create('/', 'POST', $data, [], ['logo' => $file]);
    $sponsor = (new CreateSponsor)->handle($data, $request);

    expect($sponsor->logo)->toStartWith('sponsors/')
        ->and(Storage::disk('public')->exists($sponsor->logo))->toBeTrue();
});

it('cria sponsor sem logo', function () {
    $data = [
        'name' => 'Empresa Z',
        'website' => 'https://empresaz.com',
    ];
    $request = Request::create('/', 'POST', $data);
    $sponsor = (new CreateSponsor)->handle($data, $request);

    expect($sponsor->logo)->toBeNull();
});
