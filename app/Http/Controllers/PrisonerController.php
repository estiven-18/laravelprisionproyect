<?php

namespace App\Http\Controllers;

use App\Models\Prisoner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PrisonerRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PrisonerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $prisoners = Prisoner::paginate();

        return view('prisoner.index', compact('prisoners'))
            ->with('i', ($request->input('page', 1) - 1) * $prisoners->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $prisoner = new Prisoner();

        return view('prisoner.create', compact('prisoner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrisonerRequest $request): RedirectResponse
    {
        Prisoner::create($request->validated());

        return Redirect::route('prisoners.index')
            ->with('success', 'Prisoner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $prisoner = Prisoner::find($id);

        return view('prisoner.show', compact('prisoner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $prisoner = Prisoner::find($id);

        return view('prisoner.edit', compact('prisoner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrisonerRequest $request, Prisoner $prisoner): RedirectResponse
    {
        $prisoner->update($request->validated());

        return Redirect::route('prisoners.index')
            ->with('success', 'Prisoner updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Prisoner::find($id)->delete();

        return Redirect::route('prisoners.index')
            ->with('success', 'Prisoner deleted successfully');
    }
}
