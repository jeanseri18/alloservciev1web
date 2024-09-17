<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    {
        return view('auth.register');
    }



    public function register(Request $request)
    {


      
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|in:client,entreprise,professionnel,admin'
        ]);
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'roles' => $validatedData['roles'],
            ]);



            Auth::login($user);

            // Redirect based on role
            switch ($user->roles) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'professionnel':
                    return redirect()->route('client.dashboard');
                case 'entreprise':
                    return redirect()->route('client.dashboard');
                default:
                    return redirect()->route('client.dashboard');
            }
       
    }



    public function showLinkRequestForm()
{
    return view('auth.passwords'); // Assure-toi d'avoir la vue dans ce chemin
}

}

