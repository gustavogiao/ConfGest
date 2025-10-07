<?php

use App\Http\Middleware\LogRequests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

beforeEach(function () {
    Route::middleware(LogRequests::class)
        ->get('/test-log', fn () => response('Logged', 200));
});

it('logs request and response info', function () {
    Log::spy();

    $response = $this->get('/test-log', [
        'User-Agent' => 'TestAgent',
    ]);

    $response->assertStatus(200);

    Log::shouldHaveReceived('info')->withArgs(function ($message, $context) {
        return $message === 'New request received'
            && $context['method'] === 'GET'
            && $context['url'] === url('/test-log')
            && $context['user_agent'] === 'TestAgent';
    });

    Log::shouldHaveReceived('info')->withArgs(function ($message, $context) {
        return $message === 'Send response'
            && $context['status'] === 200
            && $context['content'] === 'Logged';
    });
});
