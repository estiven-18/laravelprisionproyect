<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    // Mostrar formulario
    public function create()
    {
        return view('visitors.create');
    }

    // Guardar visitante
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_number' => 'required|unique:visitors,id_number',
            'relationship_to_prisoner' => 'required',
        ], [
            'id_number.unique' => 'This ID number is already registered for another visitor.',
        ]);

        Visitor::create($request->all());

        return back()->with('success', 'Visitor registered successfully');
    }
}