<?php

namespace App\Http\Controllers;

use App\Models\Metier;
use App\Models\SousCategorie;
use Illuminate\Http\Request;

class CorpsMetierController extends Controller
{
    // Affichage de la liste des corps de métier
    public function index()
    {
        $corpsmetiers =Metier::with('souscategorie')->get();
        $souscategories = SousCategorie::with('categorie')->get(); // Récupère les sous-catégories et leurs catégories
        return view('dashboard.corpsmetier.index', compact('corpsmetiers', 'souscategories'));
    }

    // Affichage du formulaire de création
    public function create()
    {
        $souscategories = SousCategorie::with('categorie')->get(); // Récupère les sous-catégories et leurs catégories
        return view('dashboard.corpsmetier.create', compact('souscategories'));
    }

    // Stockage d'un nouveau corps de métier
    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'nom' => 'required',
            'id_souscat' => 'required',
        ]);

        Metier::create(['nom'=>$request->input('nom'),
        'id_souscat' =>$request->input('id_souscat')
    ]);
        
        return redirect()->route('corpsmetier.index')->with('success', 'Corps de métier créé avec succès.');
    }

    // Affichage du formulaire d'édition
    public function edit($id)
    {
        $corpsmetier =Metier::findOrFail($id)->with('souscategorie')->first();
        $souscategories = SousCategorie::with('categorie')->get(); // Récupère les sous-catégories et leurs catégories
        return view('dashboard.corpsmetier.edit', compact('corpsmetier', 'souscategories'));
    }

    // Mise à jour d'un corps de métier
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'id_souscat' => 'required',
        ]);

        $corpsmetier =Metier::findOrFail($id);
        $corpsmetier->update($request->all());
        
        return redirect()->route('corpsmetier.index')->with('success', 'Corps de métier mis à jour avec succès.');
    }

    // Suppression d'un corps de métier
    public function destroy($id)
    {
        $corpsmetier =Metier::findOrFail($id);
        $corpsmetier->delete();

        return redirect()->route('corpsmetier.index')->with('success', 'Corps de métier supprimé avec succès.');
    }
}
