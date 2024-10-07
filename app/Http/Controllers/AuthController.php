<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Categorie;
use App\Models\SousCategorie;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
                // Valider les données de connexion
                $credentials = $request->only('email', 'password');

                if (Auth::attempt($credentials)) {
                    $user = Auth::user();
                    // Redirection en fonction du rôle de l'utilisateur
                    switch ($user->roles) {
                        case 'admin':
                            return redirect()->route('admin.dashboard');
                        case 'client':
                            return redirect()->route('client.dashboard');
                        case 'professionnel':
                            return redirect()->route('client.dashboard');
                        default:
                            return redirect()->route('client.dashboard');
                    }
                }
        
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            }
        
    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showRegistrationForm()
    {        $categories = Categorie::all();
             $souscategories = SousCategorie::all();
        return view('auth.register', compact('categories','souscategories'));
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
        'categorie_id' => 'nullable|integer|exists:categories,id', // Validation du categorie_id
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
        'categorie_id' => $validatedData['categorie_id'], // Ajout de categorie_id
        'facebook' => $validatedData['facebook'],
        'whatsapp' => $validatedData['whatsapp'],
        'youtube' => $validatedData['youtube'],
        'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : null,
    ]);

    Auth::login($user);

    // Redirection basée sur le rôle
    switch ($user->roles) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'professionnel':
        case 'entreprise':
            return redirect()->route('client.dashboard');
        default:
            return redirect()->route('client.dashboard');
    }
}


    public function afterregister()
    {
        return view('auth.edit', [
            'user' => Auth::user()
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
            'souscategorie_id' => 'nullable|integer|exists:souscategories,id',
            'facebook' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
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
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $validated['image'] = $imagePath;
        }
    
        $user->update($validated);
    
        switch ($user->roles) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'professionnel':
                return redirect()->route('client.dashboard');
            case 'entreprise':
                return redirect()->route('client.dashboard');
            default:
                return redirect()->route('client.dashboard');
        }    }
    

    public function showLinkRequestForm()
{
    return view('auth.passwords'); // Assure-toi d'avoir la vue dans ce chemin
}

}

