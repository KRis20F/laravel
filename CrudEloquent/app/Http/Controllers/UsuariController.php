<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use Illuminate\Http\Request;

class UsuariController extends Controller
{
    public function index()
    {
        // Usando Eloquent en lugar de Query Builder
        $usuaris = Usuari::all();
        return view('usuaris.index', compact('usuaris'));
    }

    public function create()
    {
        return view('usuaris.create');
    }

    public function store(Request $request)
    {
        // Validación manual en el controlador
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'email' => 'required|email|unique:usuaris',
            'edat' => 'required|integer|min:0'
        ]);

        // Usando Eloquent create
        Usuari::create($validated);
        return redirect()->route('usuaris.index')
            ->with('success', 'Usuari creat correctament');
    }

    public function show(Usuari $usuari)
    {
        // Añadimos el método show como pide el ejercicio
        return view('usuaris.show', compact('usuari'));
    }

    public function edit(Usuari $usuari)
    {
        return view('usuaris.edit', compact('usuari'));
    }

    public function update(Request $request, Usuari $usuari)
    {
        // Validación manual en el controlador
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'email' => 'required|email|unique:usuaris,email,' . $usuari->id,
            'edat' => 'required|integer|min:0'
        ]);

        // Usando Eloquent update
        $usuari->update($validated);
        return redirect()->route('usuaris.index')
            ->with('success', 'Usuari actualitzat correctament');
    }

    public function destroy(Usuari $usuari)
    {
        // Usando Eloquent delete
        $usuari->delete();
        return redirect()->route('usuaris.index')
            ->with('success', 'Usuari eliminat correctament');
    }
}