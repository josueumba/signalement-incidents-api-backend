<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        //L'admin voit tous les incidents
        if ($user->role == 'admin') {
            return response()->json(
                Incident::with(['user', 'categorie', 'statut'])->latest()->get()
            );
        }

        // L'utilisateur voit seulement ses incidents
        return response()->json(
            Incident::with(['user', 'categorie', 'statut'])->where('userID', $user->id)->latest()->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incident = new Incident([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'userID' => $request->input('userID'),
            'categorieID' => $request->input('categorieID')
            // 'statutID' => $request->input('statutID')
        ]);
        $incident->save();

        return response()->json(['Signalement créé avec succès'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $incident = Incident::with(['user', 'categorie', 'statut'])->find($id);
        return response()->json($incident);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $incident = Incident::find($id);
        $incident->update($request->all());

        return response()->json(['Signalement mis à jour avec succès'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $incident = Incident::find($id);
        $incident->delete();

        return response()->json(['Signalement supprimé avec succès'], 200);
    }
}
