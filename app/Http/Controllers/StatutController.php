<?php

namespace App\Http\Controllers;

use App\Models\Statut;
use Illuminate\Http\Request;

class StatutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuts = Statut::all();
        return response()->json($statuts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statut = new Statut([
            'nom' => $request->input('nom'),
            'description' => $request->input('description')
        ]);
        $statut->save();

        return response()->json(['Statut créé avec succès'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $statut = Statut::find($id);
        return response()->json($statut);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $statut = Statut::find($id);
        $statut->update($request->all());

        return response()->json(['Statut mis à jour avec succès'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $statut = Statut::find($id);
        $statut->delete();

        return response()->json(['Statut supprimé avec succès'], 200);
    }
}
