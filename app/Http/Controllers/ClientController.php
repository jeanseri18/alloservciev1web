<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Afficher la liste des utilisateurs
    public function index()
    {
        $clients = User::all(); // Récupère tous les utilisateurs
        return view('dashboard.clients.index', compact('clients'));
    }

    // Créer un utilisateur
    public function create()
    {
        return view('dashboard.clients.create'); // Affiche la vue de création
    }

    // Enregistrer un nouvel utilisateur
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'entreprise' => 'nullable|string',
            'registre_de_commerce' => 'nullable|string',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string',
            'mot_cle' => 'nullable|string',
            'souscategorie_id' => 'nullable|integer',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'facebook' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'youtube' => 'nullable|string',
            'roles' => 'nullable|string',
            'statut' => 'nullable|string',
        ]);

        $validated['password'] = bcrypt($validated['password']); // Hasher le mot de passe
        $validated['roles'] ="admin"; // Hasher le mot de passe

        User::create($validated);

        return redirect()->route('clients.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // Désactiver un utilisateur
    public function deactivate($id)
    {
        $client = User::findOrFail($id);
        $client->statut = 0; // Mettre à jour le statut de l'utilisateur
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Utilisateur désactivé avec succès.');
    }
}
