<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Categorie;
use App\Models\SousCategorie;

class ApiController extends Controller
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'entreprise' => 'nullable|string|max:255',
            'registre_de_commerce' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'mot_cle' => 'nullable|string|max:255',
            'souscategorie_id' => 'nullable|integer|exists:sous_categories,id',
            'categorie_id' => 'nullable|integer|exists:categories,id',
            'facebook' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'roles' => 'entreprise',
            'entreprise' => $validatedData['entreprise'],
            'registre_de_commerce' => $validatedData['registre_de_commerce'],
            'adresse' => $validatedData['adresse'],
            'telephone' => $validatedData['telephone'],
            'mot_cle' => $validatedData['mot_cle'],
            'souscategorie_id' => $validatedData['souscategorie_id'],
            'categorie_id' => $validatedData['categorie_id'],
            'facebook' => $validatedData['facebook'],
            'whatsapp' => $validatedData['whatsapp'],
            'youtube' => $validatedData['youtube'],
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : null,
        ]);

        Auth::login($user);

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
