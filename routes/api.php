<?php

use App\Http\Controllers\Api\SpeakerController;
use App\Http\Middleware\LogRequests;
use App\Http\Middleware\RestrictIpAccess;
use Illuminate\Support\Facades\Route;

Route::middleware([LogRequests::class, RestrictIpAccess::class])->group(function () {
    Route::get('/speakers', [SpeakerController::class, 'index']);
    Route::get('/speakers/{speaker}', [SpeakerController::class, 'show']);
});
