<?php

namespace App\Http\Controllers;

use App\Models\Professionnel;
use App\Models\SousCategorie; // Assurez-vous d'inclure ce modèle
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfessionnelController extends Controller
{
    // Affiche la liste des professionnels
    public function index()
    {
        $professionnels = Professionnel::all();
        return view('dashboard.professionnel.index', compact('professionnels'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $sousCategories = SousCategorie::all(); // Récupère toutes les sous-catégories
        return view('dashboard.professionnel.create', compact('sousCategories'));
    }

    // Stocke un nouveau professionnel dans la base de données
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'domaine' => 'required|exists:sous_categories,id', // Validation pour la sous-catégorie
            'ville' => 'required|string|max:255',
            'detail' => 'nullable|string',
            'telephone' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validated['image'] = basename($imagePath);
        }

        $validated['user_id'] = auth()->id(); // Associe l'utilisateur connecté

        Professionnel::create($validated);

        return redirect()->route('dashboard.professionnel.index')->with('success', 'Professionnel créé avec succès.');
    }

    // Affiche les détails d'un professionnel
    public function show(Professionnel $professionnel)
    {
        return view('dashboard.professionnel.show', compact('professionnel'));
    }

    // Affiche le formulaire d'édition
    public function edit(Professionnel $professionnel)
    {
        $sousCategories = SousCategorie::all(); // Récupère toutes les sous-catégories
        return view('dashboard.professionnel.edit', compact('professionnel', 'sousCategories'));
    }

    // Met à jour les informations d'un professionnel
    public function update(Request $request, Professionnel $professionnel)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'domaine' => 'required|exists:sous_categories,id', // Validation pour la sous-catégorie
            'ville' => 'required|string|max:255',
            'detail' => 'nullable|string',
            'telephone' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($professionnel->image && Storage::exists('public/images/' . $professionnel->image)) {
                Storage::delete('public/images/' . $professionnel->image);
            }

            $imagePath = $request->file('image')->store('public/images');
            $validated['image'] = basename($imagePath);
        }

        $professionnel->update($validated);

        return redirect()->route('dashboard.professionnel.index')->with('success', 'Professionnel mis à jour avec succès.');
    }

    // Supprime un professionnel
    public function destroy(Professionnel $professionnel)
    {
        // Supprimer l'image si elle existe
        if ($professionnel->image && Storage::exists('public/images/' . $professionnel->image)) {
            Storage::delete('public/images/' . $professionnel->image);
        }

        $professionnel->delete();
        return redirect()->route('dashboard.professionnel.index')->with('success', 'Professionnel supprimé avec succès.');
    }
}
