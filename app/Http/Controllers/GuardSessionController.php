<?php

namespace App\Http\Controllers;

use App\Models\GuardSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GuardSessionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GuardSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $guardSessions = GuardSession::with('user')->paginate();

        return view('guard-session.index', compact('guardSessions'))
            ->with('i', ($request->input('page', 1) - 1) * $guardSessions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $guardSession = new GuardSession();

        return view('guard-session.create', compact('guardSession'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardSessionRequest $request): RedirectResponse
    {
        GuardSession::create($request->validated());

        return Redirect::route('guard-sessions.index')
            ->with('success', 'GuardSession created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $guardSession = GuardSession::find($id);

        return view('guard-session.show', compact('guardSession'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $guardSession = GuardSession::find($id);

        return view('guard-session.edit', compact('guardSession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuardSessionRequest $request, GuardSession $guardSession): RedirectResponse
    {
        $guardSession->update($request->validated());

        return Redirect::route('guard-sessions.index')
            ->with('success', 'GuardSession updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        GuardSession::find($id)->delete();

        return Redirect::route('guard-sessions.index')
            ->with('success', 'GuardSession deleted successfully');
    }
}
