<?php

use App\Http\Middleware\RestrictIpAccess;
use Illuminate\Support\Facades\Route;

beforeEach(function () {
    // Define a test route using the middleware
    Route::middleware(RestrictIpAccess::class)
        ->get('/test-ip', fn () => response('OK', 200));
});

it('allows access for allowed IP', function () {
    $response = $this->get('/test-ip', ['REMOTE_ADDR' => '127.0.0.1']);
    $response->assertStatus(200);
    $response->assertSee('OK');
});

it('denies access for not allowed IP', function () {
    $response = $this->get('/test-ip', ['REMOTE_ADDR' => '8.8.8.8']);
    $response->assertStatus(403);
    $response->assertSee('Acesso não autorizado.');
});
