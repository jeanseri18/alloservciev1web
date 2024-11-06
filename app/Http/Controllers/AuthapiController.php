<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Categorie;
use App\Models\SousCategorie;

class AuthapiController extends Controller
{
    public function login(Request $request)
    {
        // Valider les données de connexion
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'user' => $user,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'The provided credentials do not match our records.',
        ], 401);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Logout successful',
        ]);
    }

    public function register(Request $request)
    {
       

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles' => 'entreprise',
            'entreprise' => $request->entreprise,
            'registre_de_commerce' => $request->registre_de_commerce,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'mot_cle' => $request->mot_cle,
            'souscategorie_id' => $request->souscategorie_id,
            'categorie_id' => $request->categorie_id,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'youtube' => $request->youtube,
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : null,
        ]);


        return response()->json([
            'status' => 'success',
            'message' => 'Registration successful',
            'user' => $user,
        ]);
    }

    public function updateafterregister(Request $request)
    {
        $validated = $request->validate([
            'entreprise' => 'nullable|string|max:255',
            'registre_de_commerce' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'mot_cle' => 'nullable|string|max:255',
            'souscategorie_id' => 'nullable|integer|exists:sous_categories,id',
            'facebook' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $validated['image'] = $imagePath;
        }

        $user->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'user' => $user,
        ]);
    }
}
