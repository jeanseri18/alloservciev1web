<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CorpsMetierController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\SouscategorieController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\ProfessionnelController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ClientController;


Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::post('/clients/{id}/deactivate', [ClientController::class, 'deactivate'])->name('clients.deactivate');

// Route pour la page d'accueil
Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

// Route pour la page "detailentreprise"
Route::get('/detail-entreprise', [PublicController::class, 'detailentreprise'])->name('detailentreprise');

// Route pour la page "detailpro"
Route::get('/detail-pro', [PublicController::class, 'detailpro'])->name('detailpro');
Route::get('/aide', [PublicController::class, 'help'])->name('help');

// Route pour la page "entreprise"
Route::get('/entreprise', [PublicController::class, 'entreprise'])->name('entreprise');

// Route pour la page "pro"
Route::get('/pro', [PublicController::class, 'pro'])->name('pro');

Route::prefix('horaires')->group(function () {
    Route::get('/', [HoraireController::class, 'index'])->name('horaires.index');
    Route::get('/create', [HoraireController::class, 'create'])->name('horaires.create');
    Route::post('/', [HoraireController::class, 'store'])->name('horaires.store');
    Route::get('/{horaire}', [HoraireController::class, 'show'])->name('horaires.show');
    Route::get('/{horaire}/edit', [HoraireController::class, 'edit'])->name('horaires.edit');
    Route::put('/{horaire}', [HoraireController::class, 'update'])->name('horaires.update');
    Route::delete('/{horaire}', [HoraireController::class, 'destroy'])->name('horaires.destroy');
});
Route::post('/horaires/{horaire}/toggle-status', [HoraireController::class, 'toggleStatus'])->name('horaires.toggleStatus');

Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

// Route pour afficher la liste des listofpro
Route::get('/professionnels', [ProfessionnelController::class, 'index'])->name('professionnels.index');

// Route pour afficher le formulaire de création
Route::get('/professionnels/create', [ProfessionnelController::class, 'create'])->name('professionnels.create');

// Route pour stocker un nouveau professionnel
Route::post('/professionnels', [ProfessionnelController::class, 'store'])->name('professionnels.store');

// Route pour afficher les détails d'un professionnel
Route::get('/professionnels/{professionnel}', [ProfessionnelController::class, 'show'])->name('professionnels.show');

// Route pour afficher le formulaire d'édition
Route::get('/professionnels/{professionnel}/edit', [ProfessionnelController::class, 'edit'])->name('professionnels.edit');

// Route pour mettre à jour un professionnel
Route::put('/professionnels/{professionnel}', [ProfessionnelController::class, 'update'])->name('professionnels.update');

// Route pour supprimer un professionnel
Route::delete('/professionnels/{professionnel}', [ProfessionnelController::class, 'destroy'])->name('professionnels.destroy');

Route::get('/avis', [AvisController::class, 'index'])->name('avis.index');

Route::get('/souscategories', [SouscategorieController::class, 'index'])->name('souscategories.index');
Route::get('/souscategories/create', [SouscategorieController::class, 'create'])->name('souscategories.create');
Route::post('/souscategories', [SouscategorieController::class, 'store'])->name('souscategories.store');
Route::get('/souscategories/{souscategorie}/edit', [SouscategorieController::class, 'edit'])->name('souscategories.edit');
Route::put('/souscategories/{souscategorie}', [SouscategorieController::class, 'update'])->name('souscategories.update');
Route::delete('/souscategories/{souscategorie}', [SouscategorieController::class, 'destroy'])->name('souscategories.destroy');




Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/registers', [AuthController::class, 'register'])->name('registers');
// routes/web.php

Route::get('password/reset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/client/dashboard', [DashboardController::class, 'index'])->name('client.dashboard');
Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');





    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [UserProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    });
    
   

Route::post('/actions/visit-profile/{user}', [ActionController::class, 'visitProfile'])->name('actions.visitProfile');
Route::post('/actions/make-call/{user}', [ActionController::class, 'makeCall'])->name('actions.makeCall');

    




Route::get('/search', [PublicController::class, 'searchentreprisebycategorie'])->name('search');
Route::get('/search-entreprise', [PublicController::class, 'searchentreprisebycategorie'])->name('searchentreprise');
Route::get('/listby-categorie/{id}/entreprise', [PublicController::class, 'showUsersByCategory'])->name('categorie.users');

Route::get('/listofpro/recherche', [PublicController::class, 'searchprobycategorie'])->name('searchprobycategorie');
Route::get('/detailentreprise/{id}', [PublicController::class, 'detailentreprise'])->name('detailentreprise');
Route::get('/detailpro/{id}', [PublicController::class, 'detailpro'])->name('detailpro');
Route::post('/avis-store', [PublicController::class, 'avisstore'])->name('avis.store');
Route::get('/annuaire', [PublicController::class, 'annuair'])->name('annuaire.index');


