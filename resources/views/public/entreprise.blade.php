@extends('layouts.public')

@section('title', 'Entreprise | Allo service')
<style>
    .btn-group-wrapper {
    overflow-x: auto;
    white-space: nowrap;
    padding-bottom: 10px; /* Optionnel : pour plus d'espace en bas */
}

.btn-group-wrapper a {
    margin-right: 10px;
    white-space: nowrap;
}

    </style>
@section('content')
<section class="bg-light"
    style="background: linear-gradient(to right top, #0470B8, #023252), no-repeat right; background-size: auto; background-position: right; height: 300px;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 text-center">
                <h1 class="display-2 text-white">TROUVEZ UNE ENTREPRISE</h1>
            </div>
        </div>
    </div>
</section>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12" style="background:#0470B843; padding: 20px;">
            <form action="{{ route('searchentreprise') }}" method="GET">
                <!-- Action pour la recherche -->
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="localisation" placeholder="Localisation" required>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" id="categorie_id" name="categorie_id" required>
                            <option value="{{ $localisation }}">Sélectionnez une catégorie</option>
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
    <br><br>
    @if(!empty($souscategories) && $souscategories->isNotEmpty())
    <div class="form-group">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 mx-auto">
                <div class="d-flex flex-column gap-2 text-left ">
                    <h2 class="mb-0 h1 text-left">Sous categorie</h2>
                    <p class="mb-0 text-left">Choisissez une sous categorie pour explorer les professionnels disponibles</p>
                </div><br>
                <div class="btn-group-wrapper" style="overflow-x: auto; white-space: nowrap;">
    @foreach($souscategories as $souscategorie)
        <form action="{{ route('searchentreprise') }}" method="GET" style="display: inline;">
        <input type="hidden" name="localisation" value="{{ request('localisation') }}">

            <input type="hidden" name="souscategorie_id" value="{{ $souscategorie->id }}">
            <input type="hidden" name="categorie_id" value="{{ $souscategorie->categorie_id }}">
            <button type="submit" class="btn" style="margin-right: 10px; white-space: nowrap; background:{{ isset($souscategorie_id) && $souscategorie_id == $souscategorie->id ? '#02385C' : '#0470B843' }}; color:{{ isset($souscategorie_id) && $souscategorie_id == $souscategorie->id ? 'white' : '#02385C' }}; border-radius:20px">
                {{ $souscategorie->nom_souscategorie }}
            </button>
        </form>
    @endforeach
</div>

            </div>
        </div>
    </div>
@endif
<br>
<h2 class="mb-0 h1 text-left">Resultat</h2><br>

    @if(isset($users) && count($users) > 0)
    <!-- Vérification s'il y a des utilisateurs -->
    @foreach($users as $user)
    <div class="card card-bordered mb-3 card-hover cursor-pointer">
        <!-- card body -->
        <div class="card-body">
            <div class="d-xl-flex">
                <div class="mb-3 mb-md-0">
                    <!-- Img -->
                   <center> <img src="{{ asset('storage/'.$user->image) }}" alt="{{ $user->entreprise }}"
                        class="icon-shape border rounded-circle" width="100" height="100"></center>
                    <!-- Assurez-vous que l'image est stockée correctement -->
                </div>
                <!-- text -->
                <div class="ms-xl-3 w-100 mt-3 mt-xl-1 uppercase">
                <a href="{{ route('detailentreprise', $user->id) }}" class="text-inherit"> <h2 class="mb-1 fs-2 text-uppercase ">
                {{ $user->entreprise }}

                    </h2>                <span class="text-muted fs-5">({{ $user->souscategorie_nom ?? '' }})</span> <!-- Remplacez par le bon champ -->
                    </a>
                    <div>
                        <span>{{ $user->description ?? 'Description non disponible' }}</span>
                    </div>

                    <div class="mt-2">
                        <div>
                            <i class="fe fe-map-pin"></i>
                            <span class="ms-1">{{ $user->adresse }}</span>
                        </div>
                        <div>
                            <i class="fe fe-phone"></i>
                            <span class="ms-1">{{ $user->telephone }}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mt-3">
                        <a href="tel:{{ $user->telephone }}" class="btn btn-primary me-2">
                            <i class="fe fe-phone"></i> Lancer un appel
                        </a>
                        <a class=" btn-lin me-2 text-primary" href="{{ route('detailentreprise', $user->id) }}">
                            <u>Écrire un avis</u>   ({{ $user->avisCount() ?? 0 }} avis disponibles)
                        </a>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p>Aucune entreprise trouvée.</p>
    @endif
</div>
<div class="d-flex justify-content-center">
    <nav>
        <ul class="pagination">
            <!-- Lien Previous -->
            @if ($users->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Précédent</span></li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $users->appends(request()->input())->previousPageUrl() }}" rel="prev">Précédent</a>
                </li>
            @endif

            <!-- Numéros de pages -->
            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                @if ($page == $users->currentPage())
                    <li class="page-item active">
                        <span class="page-link">{{ $page }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $users->appends(request()->input())->url($page) }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            <!-- Lien Next -->
            @if ($users->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $users->appends(request()->input())->nextPageUrl() }}" rel="next">Suivant</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">Suivant</span></li>
            @endif
        </ul>
    </nav>
</div>
@endsection
