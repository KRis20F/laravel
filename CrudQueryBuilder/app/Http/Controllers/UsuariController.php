<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariController extends Controller
{
    public function index()
    {
        $usuaris = DB::table('usuaris')->get();
        return view('usuaris.index', compact('usuaris'));
    }

    public function create()
    {
        return view('usuaris.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'email' => 'required|email|unique:usuaris',
            'edat' => 'required|integer|min:0'
        ]);

        DB::table('usuaris')->insert($validated);
        return redirect()->route('usuaris.index')->with('success', 'Usuari creat correctament');
    }

    public function edit($id)
    {
        $usuari = DB::table('usuaris')->find($id);
        return view('usuaris.edit', compact('usuari'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'email' => 'required|email|unique:usuaris,email,'.$id,
            'edat' => 'required|integer|min:0'
        ]);

        DB::table('usuaris')->where('id', $id)->update($validated);
        return redirect()->route('usuaris.index')->with('success', 'Usuari actualitzat correctament');
    }

    public function destroy($id)
    {
        DB::table('usuaris')->where('id', $id)->delete();
        return redirect()->route('usuaris.index')->with('success', 'Usuari eliminat correctament');
    }
}