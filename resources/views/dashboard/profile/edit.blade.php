@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@section('content')
<section style="background:white;">
    <div class=" py-5">
   

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ $user->image ? asset('storage/'.$user->image) : 'https://via.placeholder.com/150' }}"
                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ $user->name }}</h5>
                      
                        <h5 class="text-muted mb-4">{{ $user->email ?? 'Location not provided' }}</h5>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" id="editImageBtn" class="btn btn-secondary btn-sm">
                                <i class="fa fa-edit"></i> Modifier l'image
                            </button>
                        </div>
                        <input type="file" name="image" id="image" class="form-control d-none">
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        @if(session('successprofile'))
                        <div class="alert alert-success text-left">
                            {{ session('successprofile') }}
                        </div>
                        @endif

                        <!-- Formulaire pour les informations personnelles -->
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Informations Personnelles -->
                            <!--h3 class="text-left mb-4"> Informations Personnelles</h3>
                            <hr>

                            <div class="form-group row mb-3">
                                <label for="name" class=" col-form-label"><i class="fa fa-user"></i> Nom</label>
                                <div class="">
                                    <input type="text" name="name" id="name" class="form-control "
                                        value="{{ old('name', $user->name) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="email" class=" col-form-label"><i class="fa fa-envelope"></i>
                                    Email</label>
                                <div class="">
                                    <input type="email" name="email" id="email" class="form-control "
                                        value="{{ old('email', $user->email) }}" required>
                                </div>
                            </div-->

                     
                <!-- Informations Entreprise -->
                <h3 class="mt-4 text-left"> Informations Entreprise</h3>
                <hr>
                <div class="form-group">
                    <label for="entreprise"><i class="fa fa-industry"></i> Nom de l'Entreprise</label>
                    <input type="text" name="entreprise" id="entreprise" class="form-control " value="{{ old('entreprise', $user->entreprise) }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="registre_de_commerce"><i class="fa fa-file"></i> Registre de Commerce</label>
                    <input type="text" name="registre_de_commerce" id="registre_de_commerce" class="form-control " value="{{ old('registre_de_commerce', $user->registre_de_commerce) }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="adresse"><i class="fa fa-map-marker"></i> Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="form-control " value="{{ old('adresse', $user->adresse) }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="telephone"><i class="fa fa-phone"></i> Téléphone</label>
                    <input type="text" name="telephone" id="telephone" class="form-control " value="{{ old('telephone', $user->telephone) }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="mot_cle"><i class="fa fa-key"></i> Mot Clé</label>
                    <input type="text" name="mot_cle" id="mot_cle" class="form-control " value="{{ old('mot_cle', $user->mot_cle) }}">
                </div><br>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div><br>
                <div class="card mb-4 container">

                    <h3 class="mt-5 text-left"> Modifier le Mot de Passe</h3>
                    <hr>
                    <form action="{{ route('profile.updatePassword') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="current_password"><i class="fa fa-lock"></i> Mot de Passe Actuel</label>
                            <input type="password" name="current_password" id="current_password"
                                class="form-control " required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="new_password"><i class="fa fa-lock"></i> Nouveau Mot de Passe</label>
                            <input type="password" name="new_password" id="new_password"
                                class="form-control " required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="new_password_confirmation"><i class="fa fa-lock"></i> Confirmer le Nouveau Mot
                                de Passe</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                class="form-control " required>
                        </div>
                       
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary btn-block">
                          Modifier le Mot de Passe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection