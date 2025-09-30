<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Sponsor\CreateSponsor;
use App\Actions\Sponsor\DeleteSponsor;
use App\Actions\Sponsor\UpdateSponsor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sponsor\SponsorRequest;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsors = Sponsor::paginate(5);

        return view('admin.sponsors.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ranks = ['Bronze', 'Prata', 'Ouro', 'Platina'];

        return view('admin.sponsors.create', compact('ranks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SponsorRequest $request, CreateSponsor $action)
    {
        $action->handle($request->validated(), $request);

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'Sponsor created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsor $sponsor)
    {
        return view('admin.sponsors.show', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsor $sponsor)
    {
        $ranks = ['Bronze', 'Prata', 'Ouro', 'Platina'];

        return view('admin.sponsors.edit', compact('sponsor', 'ranks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SponsorRequest $request, Sponsor $sponsor, UpdateSponsor $action)
    {
        $action->handle($sponsor, $request, $request->validated());

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'Sponsor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsor $sponsor, DeleteSponsor $action)
    {
        $action->handle($sponsor);

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'Sponsor deleted successfully.');
    }
}
