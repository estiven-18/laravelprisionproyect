<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\VisitorRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $visitors = Visitor::where('state', 'active')
            ->orderByDesc('id')
            ->paginate();

        return view('visitors.index', compact('visitors'))
            ->with('i', ($request->input('page', 1) - 1) * $visitors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $visitor = new Visitor();

        return view('visitors.create', compact('visitor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisitorRequest $request): RedirectResponse
    {
        Visitor::create($request->validated());

        return Redirect::route('visitors.index')
            ->with('success', 'Visitor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $visitor = Visitor::find($id);

        return view('visitors.show', compact('visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $visitor = Visitor::find($id);

        return view('visitors.edit', compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisitorRequest $request, Visitor $visitor): RedirectResponse
    {
        $visitor->update($request->validated());

        return Redirect::route('visitors.index')
            ->with('success', 'Visitor updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Visitor::findOrFail($id)->update([
            'state' => 'deleted',
        ]);

        return Redirect::route('visitors.index')
            ->with('success', 'Visitor deleted successfully');
    }
}