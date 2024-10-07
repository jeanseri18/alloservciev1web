@extends('layouts.public')

@section('title', 'Welcome | detail pro')

@section('content')
<section class="py-xl-8 py-6">
    <div class="container">
        <!--row-->
        <div class="row gy-4">
        <div class="col-xl-5 col-5 bg-primary card">
        <div class="">
                        <!--img-->
                        <div class="rounded-top-3 bg-primary" style=" height: 108px"></div>
                        <div class="card-body p-md-5">
                            <div class="d-flex flex-column gap-5">
                                <!--img-->
                                <div class="mt-n8">
                                  <center>  <img src="{{ asset('storage/images/'.$professionnel->image) }}" alt="{{ $professionnel->nom }} " class="img-fluid rounded-4 mt-n8"></center>
                                </div>
                                <div class="d-flex flex-column gap-5">
                                    <div class="d-flex flex-column gap-3">
                                        <div class=" justify-content-between ">
                                            <!--heading-->
                                          <hr/>
                                               <center> <h2 class="mb-0 text-white text-uppercase " >                                {{$professionnel->nom }}
                                              
                                            </h2 ></center>
                                            <hr/>
                                                <!--content-->
                                                <div class="" style="color:#023252">
                                                    <h5 class="fw-medium text-gray-800">Profession:   #{{$professionnel->categorie_nom }}</h5>
                                                    <h5 class="fw-medium text-success">Specializations:   #{{$professionnel->souscategorie_nom }}</h5>                                              

                                            </div>
                                            <!--button-->
                                        
                                        </div>
                                        <div class="">
                                            <div class="d-flex flex-row gap-2 align-items-center lh-1">
                                                <!--icon-->
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill text-warning align-baseline" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                    </svg>
                                                </span>
                                                <span>
                                                    <!--text-->
                                                    <span class="text-white fw-bold">5.0({{$professionnel->avis->count() }} avis)</span>
                                                   
                                                </span>
                                            </div>
                                            <br>   
                                            <div class="d-flex flex-row gap-2 align-items-center lh-1">
                                                <!--icon-->
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-geo-alt-fill text-danger" viewBox="0 0 16 16">
                                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"></path>
                                                    </svg>
                                                </span>
                                             <span class="text-white"> {{$professionnel->ville }},  {{$professionnel->commune }}</span>
                                            </div>
                                        </div>
                                        <a href="tel:{{ $professionnel->telephone }}"  class="btn btn-outline-primary btn-white">Lancer un appel</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
            <div class="col-xl-7 col-7 bg-white border-1">
                <div class="d-flex flex-column gap-4">
                    <!--card-->
                    
                    <!--card-->
                    <div class="card">
                        <!--card body-->
                        <div class="card-body p-md-5 d-flex flex-column gap-3">
                            <!--heading-->
                            <h3 class="mb-0">Presentation</h3>
                            <div class="d-flex flex-column">
                                <!--para-->
                                {{$professionnel->detail }}
                                <h5 class="fw-medium ">Prix de la prestation:   {{$professionnel->prixprestation }}</h5>                                              

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <!--card body-->
                        <div class="card-body p-md-5 d-flex flex-column gap-3">
                            <!--heading-->
                            <h3 class="mb-0">Horaire</h3>
                            <div class="d-flex flex-column">
                                <!--para-->
                                <ul class="list-unstyled">
                                    @foreach($professionnel->user->horaires as $horaire)
                                    <li class="s"
                                        style="min-height:30px; width: 400px; border-radius: 5px; padding: 15px; margin-bottom: 10px; background-color: #f8f9fa;">
                                        <strong><i class="fas fa-clock" style="margin-right: 5px;"></i>
                                            {{ $horaire->jour_semaine }}</strong>
                                        @if($horaire->statut === 'fermé')
                                        <span class="text-danger" style="font-weight: bold;">Fermé</span>
                                        @else
                                        <span style="font-weight: bold;"> </span>
                                        {{ $horaire->heure_ouverture }} - {{ $horaire->heure_fermeture }} <br>
                                        @endif
                                        <!-- Ajoute d'autres champs si nécessaire -->
                                    </li>
                                    @endforeach
                                
                            </div>
                        </div>
                    </div>
                    <!--card-->
                    <div class="card">
                        <!-- card body -->
                        <div class="card-body p-md-5">
                            <!-- Bouton pour ouvrir le modal -->
                            <div class="row card-header">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h3 class="mb-0">Avis Récent</h3>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <!-- Bouton pour ouvrir le modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#avisModal">
                                        Ajouter un Avis
                                    </button>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="avisModal" tabindex="-1" aria-labelledby="avisModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="avisModalLabel">Laissez un Avis</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('avis.store') }}" class="mt-4">
                                                @csrf
                                                <input type="hidden" name="professionnel_id" value="{{ $professionnel->id }}">
                                                <input type="hidden" name="type" value="professionnel"> <!-- Ou "user" -->

                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="nom" class="form-label">Votre Nom</label>
                                                        <input type="text" class="form-control" id="nom" name="nom"
                                                            required>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="tel" class="form-label">Votre Téléphone</label>
                                                        <input type="tel" class="form-control" id="tel" name="tel"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="detail_message" class="form-label">Votre Avis</label>
                                                    <textarea class="form-control" id="detail_message"
                                                        name="detail_message" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nbre_etoile" class="form-label">Nombre d'Étoiles</label>
                                                    <div class="star-rating">
                                                        <input type="radio" id="star-5" name="nbre_etoile" value="5" />
                                                        <label for="star-5" class="fa fa-star"></label>
                                                        <input type="radio" id="star-4" name="nbre_etoile" value="4" />
                                                        <label for="star-4" class="fa fa-star"></label>
                                                        <input type="radio" id="star-3" name="nbre_etoile" value="3" />
                                                        <label for="star-3" class="fa fa-star"></label>
                                                        <input type="radio" id="star-2" name="nbre_etoile" value="2" />
                                                        <label for="star-2" class="fa fa-star"></label>
                                                        <input type="radio" id="star-1" name="nbre_etoile" value="1" />
                                                        <label for="star-1" class="fa fa-star"></label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Soumettre</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Inclure Font Awesome -->
                            <link rel="stylesheet"
                                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

                            <style>
                            .star-rating {
                                display: flex;
                                /* Utiliser flexbox pour l'alignement */
                                justify-content: center;
                                /* Centrer les étoiles horizontalement */
                                margin-top: 10px;
                                /* Ajouter un espacement au-dessus */
                            }

                            .star-rating input {
                                display: none;
                                /* Cacher les inputs radio */
                            }

                            .star-rating label {
                                font-size: 3em;
                                /* Augmenter la taille des étoiles */
                                color: lightgray;
                                /* Couleur des étoiles vides */
                                cursor: pointer;
                                margin: 0 2px;
                                /* Ajouter de l'espace entre les étoiles */
                            }

                            .star-rating input:checked~label {
                                color: gold;
                                /* Couleur des étoiles remplies */
                            }

                            .star-rating input:checked+label,
                            .star-rating input:checked+label~label {
                                color: gold;
                                /* Couleur des étoiles remplies */
                            }

                            .star-rating label:hover,
                            .star-rating label:hover~label {
                                color: gold;
                                /* Couleur des étoiles survolées */
                            }
                            </style>

                            <div class="d-flex flex-column gap-4 mt-5">
                                @foreach ($professionnel->avis as $avis)
                                <div class="p-4 d-flex flex-column gap-3 shadow-sm border rounded "
                                    style="background:#F4F7FAFF">
                                    <!-- Section supérieure avec l'initiale, nom, date et étoiles -->
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <div class="d-flex flex-row gap-3 align-items-center">
                                            <!-- Cercle avec initiale -->
                                            <div
                                                style="width: 60px; height: 60px; background-color: #023252; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 28px; font-weight: bold; color: white;">
                                                {{ strtoupper(substr($avis->nom, 0, 1)) }}
                                            </div>
                                            <div>
                                                <!-- Nom de l'utilisateur -->
                                                <h4 class="mb-1 text-dark">{{ $avis->nom }}</h4>
                                                <!-- Étoiles et date -->
                                                <div
                                                    class="d-flex flex-md-row flex-column gap-md-2 align-items-md-center lh-1">
                                                    <!-- Étoiles -->
                                                    <div class="d-flex gap-1">
                                                        @for ($i = 1; $i <= 5; $i++) <svg
                                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            fill="{{ $i <= $avis->nbre_etoile ? '#ffc107' : '#e4e5e9' }}"
                                                            class="bi bi-star-fill">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            @endfor
                                                    </div>
                                                    <!-- Date de l'avis -->
                                                    <span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Message de l'avis -->
                                    <p class="mt-3 text-secondary">{{ $avis->detail_message }}</p>
                                    <small class="text-muted fw-medium">le
                                        {{ \Carbon\Carbon::parse($avis->created_at)->translatedFormat('d F Y') }}
                                    </small> </span>
                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- Additional Content -->
        </div>
    </div>
</section>
@endsection
