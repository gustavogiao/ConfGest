<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Conference\ConferenceRequest;
use App\Models\Conference;
use App\Models\Speaker;
use App\Models\Sponsor;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferences = Conference::paginate(5);

        return view('admin.conferences.index', compact('conferences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $speakers = Speaker::where('is_active', true)->with('type')->get();
        $sponsors = Sponsor::where('is_active', true)->get();
        $conference = new Conference;
        $action = route('admin.conferences.store');

        return view('admin.conferences.create', compact('speakers', 'sponsors', 'conference', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConferenceRequest $request)
    {
        $data = $request->validated();
        $conference = Conference::create($data);

        if (isset($data['speakers'])) {
            $conference->speakers()->sync($data['speakers']);
        }

        if (isset($data['sponsors'])) {
            $conference->sponsors()->sync($data['sponsors']);
        }

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Conference created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference)
    {
        $conference->load(['speakers.type', 'sponsors', 'participants']);

        return view('conference.show', compact('conference'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conference $conference)
    {
        $speakers = Speaker::where('is_active', true)->with('type')->get();
        $sponsors = Sponsor::where('is_active', true)->get();
        $action = route('admin.conferences.update', $conference);

        return view('admin.conferences.edit', compact('conference', 'speakers', 'sponsors', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConferenceRequest $request, Conference $conference)
    {
        $data = $request->validated();
        $conference->update($data);

        if (isset($data['speakers'])) {
            $conference->speakers()->sync($data['speakers']);
        } else {
            $conference->speakers()->detach();
        }

        if (isset($data['sponsors'])) {
            $conference->sponsors()->sync($data['sponsors']);
        } else {
            $conference->sponsors()->detach();
        }

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Conference updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conference $conference)
    {
        $conference->delete();

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Conference deleted successfully.');
    }
}
