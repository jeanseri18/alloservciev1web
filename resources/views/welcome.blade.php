@extends('layouts.public')
<style>
  .category-scroll-container {
  overflow-x: auto; /* Permet le défilement horizontal */
  white-space: nowrap; /* Évite le retour à la ligne */
  padding: 20px 0; /* Espacement autour du conteneur */
}

.category-scroll {
  display: inline-block; /* Affiche les éléments en ligne */
}

.category-card {
  display: inline-block; /* Les cartes s'affichent en ligne */
  margin-right: 20px; /* Espacement entre les cartes */
  width: 250px;
}

  </style>
@section('title', 'Welcome | Geeks')

@section('content')
<section class="bg-light" style="background: linear-gradient(to right top, #0470B8, #023252), no-repeat right; background-size: auto; background-position: right; height: 500px;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 text-center">
                <h1 class="display-2 text-white">La plateforme des pros en Côte d’Ivoire</h1>
                <p class="fs-3 text-white mb-4">Saisissez votre localité et votre besoin pour lancer une recherche</p>

                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8" style="background:#0470B843; padding: 20px; border-radius: 8px;">
                    <form action="{{ route('search') }}" method="GET">
                    <div class="row g-3">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="localisation" placeholder="Localisation" required>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" id="categorie_id" name="categorie_id" required>
                                        <option value="">Sélectionnez une catégorie</option>
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<section class="py-lg-8 pb-6">
  <div class="container pb-lg-6">
    <!--row-->
    <div class="row">
      <div class="col-12">
        <div class="text-center mb-6">
          <!--heading-->
          <h2 class="mb-0 h1">Explorez les entreprises  par Catégorie</h2>
        </div>
      </div>
    </div>
    <!--row-->
    <div class="category-scroll-container">
  <div class="category-scroll">
    @foreach($categories as $categorie)
      <div class="category-card">
        <a href="{{ route('categorie.users', $categorie->id) }}" class="card card-border-primary rounded-4" aria-label="Explorez les Mentors en Restaurant">
          <div class="card-body d-flex flex-column gap-4 text-center" >
            <div>
              <div class="icon-shape icon-xxl bg-light-primary rounded-circle">
                <img src="{{ asset('storage/' . $categorie->image) }}" alt="Category Image" class="" style="width: 40px;">
              </div>
            </div>
            <div style="  overflow: hidden;  /* Empêche le débordement de contenu hors de la carte */
    height: auto;  /* La carte s'ajustera en fonction du contenu */
    display: flex;  /* Utilisation de flexbox pour mieux gérer la disposition */
    flex-direction: column;  /*">
              <h3 class="mb-0">{{ $categorie->nom }}</h3>
            </div>
          </div>
        </a>
      </div>
    @endforeach
  </div>
</div>

  </div>
</section>


<div class="container py-5">
    <!-- Description and Statistics -->
    <div class="row text-center mb-5">
        <div class="col-12 mb-4">
            <div class="row align-items-center">
                <div class="col-md-12 text-left">
                    <h3>Description</h3>
                </div>
                <div class="col-md-8 text-left">
                    <h1 class="display-5">Avec Alloservice <span class="text-primary"> rencontrez le pro qu'il vous faut !</span></h1>
                </div>
                <div class="col-md-4 text-left">
                    <div class="d-flex justify-content-left align-items-left">
                        <div class="me-4">
                            <h2 class="mb-0">200 K</h2>
                            <p class="mb-0">Professionnels</p>
                        </div>
                        <div class="me-4">
                            <h2 class="mb-0">200 K</h2>
                            <p class="mb-0">Avis enregistrés</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cards -->
        <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="card p-4">
                <div class="display-4 text-primary mb-3 text-center">
                    <i class="fe fe-award" style="font-size: 3rem;"></i>
                </div>
                <h3 class="fw-semibold mb-2 text-center">La plateforme des pros en Côte d’Ivoire</h3>
                <p class="fs-4 mb-0 text-center">Retrouvez plus de 80% des professionnels à travers la Côte d’Ivoire.</p>
                <br>
                <br> </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="card p-4">
                <div class="display-4 text-primary mb-3 text-center">
                    <i class="fe fe-user" style="font-size: 3rem;"></i>
                </div>
                <h3 class="fw-semibold mb-2 text-center">Mise à jour en temps réel des informations</h3>
                <p class="fs-4 mb-0 text-center">Les horaires, les prestations, les actus, les coordonnées, les itinéraires, etc. de chaque professionnel sont actualisés quotidiennement.</p>
                <br>
                
         </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="card p-4">
                <div class="display-4 text-primary mb-3 text-center">
                    <i class="fe fe-users" style="font-size: 3rem;"></i>
                </div>
                <h3 class="fw-semibold mb-2 text-center">Choisissez votre fournisseur sur la base des avis clients</h3>
                <p class="fs-4 mb-0 text-center">Des avis, notes d’utilisateurs, photos, labels, … pour vous aider à faire les bons choix.</p>
                <br>
                <br></div>
        </div>
    </div>

    <!-- Promotional Section -->
    <div class="row align-items-center gx-0 rounded-3" style="background:#02385C">
        <div class="col-lg-3 col-12 d-none d-lg-block">
            <div class="d-flex justify-content-center">
                <div class="position-relative">
                    <img src="../../assets/happy-business-woman-showing-hand-removebg-preview.png" alt="image" class="img-fluid mt-n8">
                    <div class="ms-n8 position-absolute bottom-0 start-0 mb-6">
                        <img src="../../assets/images/svg/dollor.svg" alt="dollor">
                    </div>
                    <div class="me-n4 position-absolute top-0 end-0">
                        <img src="../../assets/images/svg/graph.svg" alt="graph">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-6 col-12">
            <div class="text-white p-5 p-lg-0">
                <h2 class="h1 text-white">Professionnels, gérez Gratuitement votre fiche d’entreprise AlloService</h2>
                <p class="mb-0">Gérez gratuitement toutes vos informations, vos avis, vos publications et bien plus encore directement depuis notre plateforme.</p>
                <a href="{{ route('register') }}" class="btn btn-white mt-4">Je crée mon compte</a>
            </div>
        </div>
    </div>
</div>
<section class="py-lg-8 pb-6">
  <div class="container pb-lg-6">
    <!--row-->
    <div class="row">
      <div class="col-12">
        <div class="text-center mb-6">
          <!--heading-->
          <h2 class="mb-0 h1">Les secteurs les plus consultés</h2>
        </div>
      </div>
    </div>
    <!--row-->
    <div class="row gy-4">
      <!-- Restaurant Card -->
      <div class="col-xxl-4 col-md-6 col-12">
        <a href="#restaurant" class="card card-border-primary rounded-4">
          <div class="card-body d-flex flex-column gap-4 text-center">
            <div>
              <!--image-->
              <img src="assets/side-view-man-having-lunch-restaurant 1.png" alt="Restaurant" class="img-fluid rounded-4">
            </div>
            <!--content-->
            <div>
              <h3 class="mb-0">Restaurant</h3>
            </div>
          </div>
        </a>
      </div>
      <!-- Immobilier Card -->
      <div class="col-xxl-4 col-md-6 col-12">
        <a href="#immobilier" class="card card-border-primary rounded-4">
          <div class="card-body d-flex flex-column gap-4 text-center">
            <div>
              <!--image-->
              <img src="assets/portrait-person-working-construction-industry 1.png" alt="Immobilier" class="img-fluid rounded-4">
            </div>
            <!--content-->
            <div>
              <h3 class="mb-0">Immobilier</h3>
            </div>
          </div>
        </a>
      </div>
      <!-- Hôtel Card -->
      <div class="col-xxl-4 col-md-6 col-12">
        <a href="#hotel" class="card card-border-primary rounded-4">
          <div class="card-body d-flex flex-column gap-4 text-center">
            <div>
              <!--image-->
              <img src="assets/hammocks-with-palm-trees 1.png" alt="Hôtel" class="img-fluid rounded-4">
            </div>
            <!--content-->
            <div>
              <h3 class="mb-0">Hôtel</h3>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

@endsection
