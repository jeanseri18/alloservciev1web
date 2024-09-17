<?php
namespace App\Http\Controllers;

use App\Models\SousCategorie;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SouscategorieController extends Controller
{
    public function index()
    {
        $souscategories = SousCategorie::with('categorie')->get();
        return view('dashboard.souscategories.index', compact('souscategories'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('dashboard.souscategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_souscategorie' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        // Handle file upload
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('icons', 'public');
        }

        SousCategorie::create([
            'nom_souscategorie' => $request->input('nom_souscategorie'),
            'icon' => $iconPath,
            'categorie_id' => $request->input('categorie_id'),
        ]);

        return redirect()->route('souscategories.index')->with('success', 'Sous-catégorie créée avec succès.');
    }

    public function edit(SousCategorie $souscategorie)
    {
        $categories = Categorie::all();
        return view('dashboard.souscategories.edit', compact('souscategorie', 'categories'));
    }

    public function update(Request $request, SousCategorie $souscategorie)
    {
        $request->validate([
            'nom_souscategorie' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        // Handle file upload
        $iconPath = $souscategorie->icon;
        if ($request->hasFile('icon')) {
            // Delete old icon file if exists
            if ($iconPath && Storage::disk('public')->exists($iconPath)) {
                Storage::disk('public')->delete($iconPath);
            }

            // Store new icon file
            $iconPath = $request->file('icon')->store('icons', 'public');
        }

        $souscategorie->update([
            'nom_souscategorie' => $request->input('nom_souscategorie'),
            'icon' => $iconPath,
            'categorie_id' => $request->input('categorie_id'),
        ]);

        return redirect()->route('souscategories.index')->with('success', 'Sous-catégorie mise à jour avec succès.');
    }

    public function destroy(SousCategorie $souscategorie)
    {
        // Delete icon file if exists
        if ($souscategorie->icon && Storage::disk('public')->exists($souscategorie->icon)) {
            Storage::disk('public')->delete($souscategorie->icon);
        }

        $souscategorie->delete();

        return redirect()->route('souscategories.index')->with('success', 'Sous-catégorie supprimée avec succès.');
    }
}
