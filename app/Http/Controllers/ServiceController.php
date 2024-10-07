<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // Affiche la liste des services
    public function index()
    {
        $services = Service::all();
        return view('dashboard.service.index', compact('services'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('dashboard.service.create');
    }

    // Stocke un nouveau service dans la base de données
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validated['image'] = basename($imagePath);
        }
        $validated['user_id']=auth()->user()->id;

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service créé avec succès.');
    }

    // Affiche les détails d'un service
    public function show(Service $service)
    {
        return view('dashboard.service.show', compact('service'));
    }

    // Affiche le formulaire d'édition
    public function edit(Service $service)
    {
        return view('dashboard.service.edit', compact('service'));
    }

    // Met à jour les informations d'un service
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($service->image && Storage::exists('public/images/' . $service->image)) {
                Storage::delete('public/images/' . $service->image);
            }

            $imagePath = $request->file('image')->store('public/images');
            $validated['image'] = basename($imagePath);
        }

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès.');
    }

    // Supprime un service
    public function destroy(Service $service)
    {
        // Supprimer l'image si elle existe
        if ($service->image && Storage::exists('public/images/' . $service->image)) {
            Storage::delete('public/images/' . $service->image);
        }

        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès.');
    }
}
