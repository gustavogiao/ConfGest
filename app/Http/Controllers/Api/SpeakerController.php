<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::with('type')->paginate(5);

        return response()->json($speakers);
    }

    public function show(Speaker $speaker)
    {
        $speaker->load('type');

        return response()->json($speaker);
    }
}
