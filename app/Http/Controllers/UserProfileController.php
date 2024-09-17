<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function edit()
    {
        return view('dashboard.profile.edit', [
            'user' => Auth::user()
        ]);
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'entreprise' => 'nullable|string|max:255',
            'registre_de_commerce' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'mot_cle' => 'nullable|string|max:255',
            'souscategorie_id' => 'nullable|integer|exists:souscategories,id',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'facebook' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'roles' => 'nullable|string|max:255',
            'statut' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validation pour l'image
        ]);
    
        $user = Auth::user();
    
        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
    
            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('profile_images');
            $validated['image'] = $imagePath;
        }
    
        $user->update($validated);
    
        return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès.');
    }
    
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($validated['current_password'], $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Le mot de passe actuel est incorrect.',
            ]);
        }

        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
