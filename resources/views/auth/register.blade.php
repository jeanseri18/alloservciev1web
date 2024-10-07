@extends('layouts.auth')

@section('title', 'Inscription')

@section('content')
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center" style="background-image: url('{{ asset('assets/media/misc/auth-bg.png') }}')">
        <div class="d-flex flex-column flex-top p-6 p-lg-10 w-100" style="background: linear-gradient(#0470B8, #023252);">
            <img class="d-none d-lg-block mx-auto w-300px w-lg-75 w-xl-500px mb-10 mb-lg-20" src="{{ asset('dashboard/assets/media/logos/_ALLO-SERVICES-LOGO-BLANC 3.png') }}" alt="Logo"/>
            <h1 class="d-none d-lg-block text-white fs-2qx fw-bold text-center mb-7">
                DEVENEZ VISIBLE
            </h1>
            <div class="d-none d-lg-block text-white fs-base text-center">
            </div>
        </div>
    </div>
    <!--end::Aside-->

    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <div class="w-lg-500px ">
                <center><h1><big>Créez un compte et profitez de tous nos services</big></h1></center>
                <!--begin::Form-->
                <form method="POST" action="{{ route('registers') }}" class="form w-100" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <hr/><h2>informations d'entreprise</h2>
                    <hr/>
                    <!-- Nom du représentant -->
                    <div class="fv-row mb-3">
                        <label for="name" class="form-label">Nom du représentant</label>
                        <input type="text" class="form-control bg-transparent @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- Nom de l'entreprise -->
                    <div class="fv-row mb-3">
                        <label for="entreprise" class="form-label">Nom de l'entreprise</label>
                        <input type="text" class="form-control bg-transparent @error('entreprise') is-invalid @enderror" id="entreprise" name="entreprise" value="{{ old('entreprise') }}">
                        @error('entreprise')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- Registre de commerce -->
                    <div class="fv-row mb-3">
                        <label for="registre_de_commerce" class="form-label">Registre de commerce</label>
                        <input type="text" class="form-control bg-transparent @error('registre_de_commerce') is-invalid @enderror" id="registre_de_commerce" name="registre_de_commerce" value="{{ old('registre_de_commerce') }}">
                        @error('registre_de_commerce')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- Adresse -->
                    <div class="fv-row mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control bg-transparent @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}">
                        @error('adresse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- Téléphone -->
                    <div class="fv-row mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control bg-transparent @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}">
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Mot clé -->
                    <div class="fv-row mb-3">
                        <label for="mot_cle" class="form-label">Mot clé</label>
                        <input type="text" class="form-control bg-transparent @error('mot_cle') is-invalid @enderror" id="mot_cle" name="mot_cle" value="{{ old('mot_cle') }}">
                        @error('mot_cle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-3">
    <label for="categorie_id" class="form-label">Catégorie</label>
    <select class="form-control bg-transparent @error('categorie_id') is-invalid @enderror" id="categorie_id" name="categorie_id">
        <option value="">Sélectionner une catégorie</option>
        @foreach($categories as $categorie)
            <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                {{ $categorie->nom }}
            </option>
        @endforeach
    </select>
    @error('categorie_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

                    <!-- Catégorie -->


<!-- Sous-catégorie -->
<div class="fv-row mb-3">
    <label for="souscategorie_id" class="form-label">Sous-catégorie</label>
    <select class="form-control bg-transparent @error('souscategorie_id') is-invalid @enderror" id="souscategorie_id" name="souscategorie_id">
        <option value="">Sélectionner une sous-catégorie</option>
        @foreach($souscategories as $souscategorie)
            <option value="{{ $souscategorie->id }}" {{ old('souscategorie_id') == $souscategorie->id ? 'selected' : '' }}>
                {{ $souscategorie->nom_souscategorie }}
            </option>
        @endforeach
    </select>
    @error('souscategorie_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

                    <hr/><h2>Reseaux sociaux</h2>
                    <hr/>
                    <!-- Réseaux sociaux -->
                    <div class="fv-row mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control bg-transparent @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook') }}">
                        @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="fv-row mb-3">
                        <label for="whatsapp" class="form-label">WhatsApp</label>
                        <input type="text" class="form-control bg-transparent @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}">
                        @error('whatsapp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="fv-row mb-3">
                        <label for="youtube" class="form-label">YouTube</label>
                        <input type="text" class="form-control bg-transparent @error('youtube') is-invalid @enderror" id="youtube" name="youtube" value="{{ old('youtube') }}">
                        @error('youtube')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="fv-row mb-3">
                        <label for="image" class="form-label">Image (facultatif)</label>
                        <input type="file" class="form-control bg-transparent @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <hr/><h2>informations du compte</h2>
                    <hr/>

                    <!-- Adresse Email -->
                    <div class="fv-row mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control bg-transparent @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div class="fv-row mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control bg-transparent @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Confirmation du mot de passe -->
                    <div class="fv-row mb-3">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control bg-transparent" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <div class="d-flex flex-stack">
                        <div class="fs-6 fw-bold">
                            <a href="{{ route('login') }}" class="link-primary">Vous avez déjà un compte ?</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer un compte</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Body-->
</div>
@endsection
