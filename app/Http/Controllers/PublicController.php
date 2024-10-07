<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Avis;
use App\Models\SousCategorie;
use App\Models\Professionnel;
use Illuminate\Support\Facades\DB;



class PublicController extends Controller
{
    public function welcome()
    {  
        $categories = Categorie::all();
        $souscategories = SousCategorie::with('categorie')->get();

        return view('welcome',compact('categories','souscategories'));
    }
    public function entreprise()
        {
            $localisation =  null;

            $categories = Categorie::all();
            $issearch = false;
            $souscategories = SousCategorie::with('categorie')->get();

            // Requête avec jointures
            $query = User::join('sous_categories', 'users.souscategorie_id', '=', 'sous_categories.id')
                ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id') // Ajout de la condition ON correcte
                ->select('users.*', 'categories.nom as categorie_nom', 'sous_categories.nom_souscategorie as souscategorie_nom');
        
                $users = $query->with('avis')->paginate(10);
                $souscategorie_id=null;

            return view('public.entreprise', compact('categories', 'users', 'issearch','souscategories','souscategorie_id','localisation'));
        }
        
        public function showUsersByCategory($id)
        {
            $localisation =  null;

            // Vérifie si la catégorie existe
            $categorie = Categorie::findOrFail($id);
            $categories = Categorie::all();
            $souscategories = SousCategorie::where('categorie_id', $id)->get();
        $souscategorie_id=null;
            // Récupère les utilisateurs ayant cette sous-catégorie ou catégorie via jointure
            $users = User::join('sous_categories', 'users.souscategorie_id', '=', 'sous_categories.id')
                ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                ->where('sous_categories.categorie_id', $id)
                ->select('users.*', 'categories.nom as categorie_nom', 'sous_categories.nom_souscategorie as souscategorie_nom')
                ->paginate(10);
        
            // Retourne la vue avec la catégorie, sous-catégorie et les utilisateurs
            return view('public.entreprise', compact('categories', 'users', 'souscategories','souscategorie_id','localisation'));
        }
        
        
 
        public function searchentreprisebycategorie(Request $request)
{
    $categories = Categorie::all();
    $issearch = true;

    // Récupération des paramètres de la requête
    $localisation = $request->input('localisation', null);
    $categorie_id = $request->input('categorie_id');
    $souscategorie_id = $request->input('souscategorie_id', null);

    // Construction de la requête avec une jointure
    $query = User::join('sous_categories', 'users.souscategorie_id', '=', 'sous_categories.id')
                 ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                 ->select('users.*', 'categories.nom as categorie_nom', 'sous_categories.nom_souscategorie as souscategorie_nom');

    // Filtrer par localisation
    if ($localisation) {
        $query->where(function($q) use ($localisation) {
            $q->where('users.adresse', 'LIKE', "%{$localisation}%")
              ->orWhere('users.entreprise', 'LIKE', "%{$localisation}%")
              ->orWhere('users.telephone', 'LIKE', "%{$localisation}%");
        });
    }

    // Filtrer par catégorie
    if ($categorie_id) {
        $query->where('sous_categories.categorie_id', $categorie_id);
    }

    // Filtrer par sous-catégorie
    if ($souscategorie_id) {
        $query->where('users.souscategorie_id', $souscategorie_id);
    }

    // Récupérer les sous-catégories correspondantes
    $souscategories = SousCategorie::where('categorie_id', $categorie_id)->get();
    // Récupérer les résultats
    $users = $query->with('avis')->paginate(10);

    return view('public.entreprise', compact('categories', 'users', 'issearch', 'souscategories', 'souscategorie_id', 'localisation'));
}

public function searchprobycategorie(Request $request)
{
    // Récupérer l'ID de la catégorie et de la sous-catégorie sélectionnées
    $categorie_id = $request->input('categorie_id', null);
    $souscategorie_id = $request->input('souscategorie_id', null);
    $localisation = $request->input('localisation', null);

    // Récupérer les sous-catégories
    $souscategories = SousCategorie::where('categorie_id', $categorie_id)->get();

    // Construire la requête pour chercher les professionnels par sous-catégorie
    $query = Professionnel::query();

    if ($souscategorie_id) {
        // Rechercher les professionnels ayant la sous-catégorie correspondante
        $query->where('domaine', $souscategorie_id); // Ajuster si 'domaine' n'est pas le bon champ
    }
    // Ajouter une condition de localisation si elle est présente
    if ($localisation) {
            $query->where('ville', 'LIKE', "%{$localisation}%")
                  ->Where('commune', 'LIKE', "%{$localisation}%")
                  ->Where('nom', 'LIKE', "%{$localisation}%")
                  ->Where('telephone', 'LIKE', "%{$localisation}%");
      
    }

    // Exécuter la requête pour récupérer les professionnels
    $professionnels = $query->with('avis')->paginate(9);


    // Récupérer toutes les catégories pour remplir le formulaire
    $categories = Categorie::all();

    // Retourner la vue avec les résultats
    return view('public.pro', compact('categories', 'professionnels', 'souscategories', 'souscategorie_id', 'localisation'));
}


public function detailentreprise($id)
{
    // Trouver l'utilisateur (entreprise) par son ID avec les avis
    $user = User::join('sous_categories', 'users.souscategorie_id', '=', 'sous_categories.id')
        ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
        ->select('users.*', 'categories.nom as categorie_nom', 'sous_categories.nom_souscategorie as souscategorie_nom')
        ->with(['avis', 'services', 'professionnels','horaires']) // Charger les avis, services et professionnels
        ->findOrFail($id);

    // Vérifier que l'utilisateur authentifié est le même que celui trouvé

    
    // Retourner la vue avec les détails de l'entreprise, les services et les professionnels
    return view('public.detailentreprise', compact('user'));
}

    public function detailpro($id)
    {
    // Trouver le professionnel par son ID
    $professionnel = Professionnel::join('sous_categories', 'professionnels.domaine', '=', 'sous_categories.id')
    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
    ->select('professionnels.*', 'categories.nom as categorie_nom', 'sous_categories.nom_souscategorie as souscategorie_nom')
    ->with(['avis', 'user'])->findOrFail($id);
    // Retourner la vue avec les détails du professionnel
    return view('public.detailpro', compact('professionnel'));
}
    
    public function pro()
    {        $categories = Categorie::all();
             $souscategories = SousCategorie::all();
        $professionnels = Professionnel::paginate(9);
$souscategorie_id=null;
$localisation=null;
        return view('public.pro',compact('categories', 'professionnels','souscategories','souscategorie_id','localisation'));
    }
    public function help()
    {
        return view('public.help');
    }
    public function annuaire()
    {
        return view('public.annuaire');
    }

    public function avisstore(Request $request)
{
    // Validation des données
    $request->validate([
        'nom' => 'required|string|max:255',
        'tel' => 'required|string|max:15',
        'detail_message' => 'required|string',
        'nbre_etoile' => 'required|integer|min:1|max:5',
    ]);

    // Créer un nouvel avis
    $avis = new Avis();
    $avis->nom = $request->nom;
    $avis->tel = $request->tel;
    $avis->detail_message = $request->detail_message;
    $avis->nbre_etoile = $request->nbre_etoile;
    if ($request->type === 'professionnel') {
        $avis->professionnel_id = $request->professionnel_id; // Associe l'avis au professionnel
    } else {
        $avis->user_id = $request->user_id; // Associe l'avis à l'utilisateur authentifié
    }
    $avis->save();

    return redirect()->back()->with('success', 'Votre avis a été soumis avec succès.');
}

public function annuair(Request $request)
{
    // Récupérer la recherche si elle existe
    $search = $request->input('search', null);

    // Rechercher les entreprises par nom et ajouter un champ "type"
    $entreprises = User::query();
    if ($search) {
        $entreprises->where('entreprise', 'LIKE', "%{$search}%");
        $entreprises->where('name', 'LIKE', "%{$search}%");
    }
    $entreprises = $entreprises->select('entreprise as nom','name as nomorville', 'adresse', 'telephone', DB::raw("'Entreprise' as type"), DB::raw("null as domaine"));

    // Rechercher les professionnels par nom et ajouter un champ "type"
    $professionnels = Professionnel::query();
    if ($search) {
        $professionnels->where('nom', 'LIKE', "%{$search}%");
        
    }
    
    // Joindre la table 'users' pour récupérer le nom et le téléphone du professionnel
    $professionnels = $professionnels->join('users', 'professionnels.user_id', '=', 'users.id')
                                     ->select('professionnels.nom as nom','professionnels.ville as nomorville', 'professionnels.telephone', 'professionnels.domaine', DB::raw("'Professionnel' as type"), DB::raw("null as adresse"));

    // Combiner les deux requêtes
    $results = $entreprises->union($professionnels)->paginate(10);

    // Retourner la vue avec les résultats
    return view('public.annuaire', compact('results', 'search'));
}


}