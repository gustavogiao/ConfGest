<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Speaker\CreateSpeaker;
use App\Actions\Speaker\DeleteSpeaker;
use App\Actions\Speaker\UpdateSpeaker;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Speaker\SpeakerRequest;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $speakers = Speaker::with('type')->paginate(5);

        return view('admin.speakers.index', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpeakerRequest $request, CreateSpeaker $action)
    {
        $action->handle($request->validated(), $request);

        return redirect()->route('admin.speakers.index')
            ->with('success', 'Speaker created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Speaker $speaker)
    {
        return view('admin.speakers.show', compact('speaker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speaker $speaker)
    {
        return view('admin.speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpeakerRequest $request, Speaker $speaker, UpdateSpeaker $action)
    {
        $action->handle($speaker, $request, $request->validated());

        return redirect()->route('admin.speakers.index')
            ->with('success', 'Speaker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speaker $speaker, DeleteSpeaker $action)
    {
        $action->handle($speaker);

        return redirect()->route('admin.speakers.index')
            ->with('success', 'Speaker deleted successfully.');
    }
}
