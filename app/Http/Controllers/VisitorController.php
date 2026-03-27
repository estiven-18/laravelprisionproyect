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
            'id_number.unique' => 'Este visitante ya está registrado'
        ]);

        Visitor::create($request->all());

        return back()->with('success', 'Visitante registrado correctamente');
    }
}