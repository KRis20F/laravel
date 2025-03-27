<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
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

    public function store(StoreUserRequest $request)
    {
        DB::table('usuaris')->insert([
            'nom' => $request->nom,
            'email' => $request->email,
            'edat' => $request->edat
        ]);

        return redirect()->route('usuaris.index')
            ->with('success', 'Usuari creat correctament');
    }

    public function edit($id)
    {
        $usuari = DB::table('usuaris')->find($id);
        return view('usuaris.edit', compact('usuari'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        DB::table('usuaris')
            ->where('id', $id)
            ->update([
                'nom' => $request->nom,
                'email' => $request->email,
                'edat' => $request->edat
            ]);

        return redirect()->route('usuaris.index')
            ->with('success', 'Usuari actualitzat correctament');
    }

    public function destroy($id)
    {
        DB::table('usuaris')->where('id', $id)->delete();
        return redirect()->route('usuaris.index')
            ->with('success', 'Usuari eliminat correctament');
    }
}