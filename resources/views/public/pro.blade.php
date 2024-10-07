@extends('layouts.public')

@section('title', 'Professionnels | Geeks')
<style>
    .image-fixed-size {
        height: 250px; /* Définir une hauteur fixe pour toutes les images */
        object-fit: cover; /* Permet de maintenir les proportions et de recadrer si nécessaire */
        width: 100%; /* Assurez-vous que l'image occupe toute la largeur disponible */
    }
</style>
@section('content')
<section class="bg-light"
    style="background: linear-gradient(to right top, #0470B8, #023252), no-repeat right; background-size: auto; background-position: right; height: 300px;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 text-center">
                <h1 class="display-2 text-white">TROUVEZ UN PROFESSIONNEL</h1>
            </div>
        </div>
    </div>
</section>
<br>
<div class="container">
    <form action="{{ route('searchprobycategorie') }}" method="GET">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12" style="background:#0470B843; padding: 20px;">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="localisation" class="form-control" placeholder="Localisation">
                    </div>
                    <div class="col-md-4">
                        <select name="categorie_id" class="form-control">
                            <option value="">Choisir une catégorie</option>
                            @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<section class="py-xl-8 py-6">
    <div class="container">
        <div class="row">

            <br> @if(!empty($souscategories) && $souscategories->isNotEmpty())
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 mx-auto">
                        <div class="d-flex flex-column gap-2 text-left ">
                            <h2 class="mb-0 h1 text-left">Sous categories</h2>
                            <p class="mb-0 text-left">Choisissez une sous categorie pour explorer les professionnels
                                disponibles</p>
                        </div><br>
                        <div class="btn-group-wrapper" style="overflow-x: auto; white-space: nowrap;height:70px;">
                            @foreach($souscategories as $souscategorie)
                            <form action="{{ route('searchprobycategorie') }}" method="GET" style="display: inline;">
                                <input type="hidden" name="localisation" value="{{ request('localisation') }}">

                                <input type="hidden" name="souscategorie_id" value="{{ $souscategorie->id }}">
                                <input type="hidden" name="categorie_id" value="{{ $souscategorie->categorie_id }}">
                                <button type="submit" class="btn"
                                    style="margin-right: 10px; white-space: nowrap; background:{{ isset($souscategorie_id) && $souscategorie_id == $souscategorie->id ? '#02385C' : '#0470B843' }}; color:{{ isset($souscategorie_id) && $souscategorie_id == $souscategorie->id ? 'white' : '#02385C' }}; border-radius:20px">
                                    {{ $souscategorie->nom_souscategorie }}
                                </button>
                            </form>
                            @endforeach
                        </div>
                        <br>
                    </div>
                </div>
            </div>                        @endif

            <div class="position-relative">

                <div class="row">

                    @foreach ($professionnels as $professionnel)

                    <!-- Remplacez ce code avec le code de la carte -->
                    <!--card-->
                    <div class="col-lg-4" style="margin:10px0">

                        <div class="card  rounded-4 card-bordered ">
                            <div class="p-3 d-flex flex-column gap-3">
                                <!--img-->
                                <a href="{{ route('detailpro', $professionnel->id) }}">
                                    <img src="{{ asset('storage/images/'.$professionnel->image) }}" alt="{{ $professionnel->nom }}" 
                                        class="  image-fixed-size rounded-4" >
                                </a>
                                <!--content-->
                                <div class="d-flex flex-column gap-4">
                                    <div class="d-flex flex-column gap-2">
                                        <div>
                                            <div class="d-flex align-items-center gap-2">
                                                <h3 class="mb-0">
                                                    <a href="{{ route('detailpro', $professionnel->id) }}" class="text-reset">
                                                        {{ $professionnel->nom }}</a>
                                                </h3>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-patch-check-fill text-success"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <span class="text-gray-800">{{ $professionnel->domaine }}</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between fs-6">
                                            <div>
                                                <span>{{ $professionnel->ville }}</span>
                                                <div class="vr mx-2 text-gray-200"></div>
                                                <span>{{ $professionnel->commune }}</span>
                                            </div>
                                            <div class="d-flex gap-1 align-items-center lh-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <span class="fw-bold text-dark">5.0</span>
                                                <span>({{ $professionnel->avis->count() }} avis)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <div>
                                            <span>A partir de</span>
                                            <div class="d-flex flex-row gap-1 align-items-center">
                                                <span class="fs-6">{{ $professionnel->prixprestation }} CFA/ mois</span>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('detailpro', $professionnel->id) }}" class="btn btn-outline-primary" 
                                               >Voir le profil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </br>
                    </div>
                    <!-- Fin du code de la carte -->

                    @endforeach



                    <!-- Autres éléments du carousel peuvent être ajoutés ici -->


                </div>
            </div>
            <div class="d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        <!-- Lien Previous -->
                        @if ($professionnels->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Précédent</span></li>
                        @else
                        <li class="page-item">
                            <a class="page-link"
                                href="{{ $professionnels->appends(request()->input())->previousPageUrl() }}"
                                rel="prev">Précédent</a>
                        </li>
                        @endif

                        <!-- Numéros de pages -->
                        @foreach ($professionnels->getUrlRange(1, $professionnels->lastPage()) as $page => $url)
                        @if ($page == $professionnels->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link"
                                href="{{ $professionnels->appends(request()->input())->url($page) }}">{{ $page }}</a>
                        </li>
                        @endif
                        @endforeach

                        <!-- Lien Next -->
                        @if ($professionnels->hasMorePages())
                        <li class="page-item">
                            <a class="page-link"
                                href="{{ $professionnels->appends(request()->input())->nextPageUrl() }}"
                                rel="next">Suivant</a>
                        </li>
                        @else
                        <li class="page-item disabled"><span class="page-link">Suivant</span></li>
                        @endif
                    </ul>
                </nav>
            </div>


        </div>
</section>
@endsection