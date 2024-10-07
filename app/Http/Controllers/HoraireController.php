<?php
namespace App\Http\Controllers;

use App\Models\Horaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HoraireController extends Controller
{
    // Affiche la liste des horaires
    public function index()
    {
        $horaires = Horaire::all();
        $user =Auth::user();
        return view('dashboard.horaire.index', compact('horaires','user'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('dashboard.horaire.create');
    }

    // Stocke un nouvel horaire dans la base de données
    public function store(Request $request)
    {
        // Validation pour vérifier l'unicité du jour de la semaine
        $validated = $request->validate([
            'jour_semaine' => 'required|string|max:255|unique:horaires',
            'heure_ouverture' => 'required|date_format:H:i',
            'heure_fermeture' => 'required|date_format:H:i',
            'statut_ouverture' => 'required|boolean',
        ]);
        $validated['user_id']=auth()->user()->id;

        Horaire::create($validated);

        return redirect()->route('horaires.index')->with('success', 'Horaire créé avec succès.');
    }

    // Affiche les détails d'un horaire
    public function show(Horaire $horaire)
    {
        return view('dashboard.horaire.show', compact('horaire'));
    }

    // Affiche le formulaire d'édition
    public function edit(Horaire $horaire)
    {
        return view('dashboard.horaire.edit', compact('horaire'));
    }

    // Met à jour les informations d'un horaire
    public function update(Request $request, Horaire $horaire)
    {
        $validated = $request->validate([
            'jour_semaine' => 'required|string|max:255',
            'heure_ouverture' => 'required|date_format:H:i',
            'heure_fermeture' => 'required|date_format:H:i',
            'statut_ouverture' => 'required|boolean',
        ]);

        $horaire->update($validated);

        return redirect()->route('horaires.index')->with('success', 'Horaire mis à jour avec succès.');
    }

    // Supprime un horaire
    public function destroy(Horaire $horaire)
    {
        $horaire->delete();
        return redirect()->route('horaires.index')->with('success', 'Horaire supprimé avec succès.');
    }

    // Active/Désactive un horaire
    public function toggleStatus(Horaire $horaire)
    {
        $horaire->statut_ouverture = !$horaire->statut_ouverture;
        $horaire->save();

        return redirect()->route('horaires.index')->with('success', 'Statut de l\'horaire mis à jour avec succès.');
    }
}
