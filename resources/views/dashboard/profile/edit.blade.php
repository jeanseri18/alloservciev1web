@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Profil</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire pour les informations personnelles -->
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group text-center">
            <div class="image-container mb-2 position-relative ">
              <center>  <img src="{{ $user->image ? Storage::url($user->image) : 'https://via.placeholder.com/150' }}" alt="Image de Profil" id="profileImage" class="img-thumbnail rounded-circle" style="max-width: 150px; max-height: 150px;"></br>
                <br><button type="button" id="editImageBtn" class="btn btn-secondary btn-sm ">
                    <i class="fa fa-edit"></i>modifier image
                </button></center>
            </div>
            <input type="file" name="image" id="image" class="form-control" style="display: none;">
        </div>
        <!-- Informations Personnelles -->
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- Image -->
       

        <!-- Informations Entreprise -->
        <h2>Informations Entreprise</h2>
        <div class="form-group">
            <label for="entreprise">Nom de l'Entreprise</label>
            <input type="text" name="entreprise" id="entreprise" class="form-control" value="{{ old('entreprise', $user->entreprise) }}">
        </div>
        <div class="form-group">
            <label for="registre_de_commerce">Registre de Commerce</label>
            <input type="text" name="registre_de_commerce" id="registre_de_commerce" class="form-control" value="{{ old('registre_de_commerce', $user->registre_de_commerce) }}">
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $user->adresse) }}">
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone', $user->telephone) }}">
        </div>
        <div class="form-group">
            <label for="mot_cle">Mot Clé</label>
            <input type="text" name="mot_cle" id="mot_cle" class="form-control" value="{{ old('mot_cle', $user->mot_cle) }}">
        </div>

        <!-- Réseaux Sociaux -->
        <h2>Réseaux Sociaux</h2>
        <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook', $user->facebook) }}">
        </div>
        <div class="form-group">
            <label for="whatsapp">WhatsApp</label>
            <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{ old('whatsapp', $user->whatsapp) }}">
        </div>
        <div class="form-group">
            <label for="youtube">YouTube</label>
            <input type="text" name="youtube" id="youtube" class="form-control" value="{{ old('youtube', $user->youtube) }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Sauvegarder les informations</button>
        </div>
    </form>

    <!-- Formulaire pour modifier le mot de passe -->
    <hr>
    <h2>Modifier le Mot de Passe</h2>
    <form action="{{ route('profile.updatePassword') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="current_password">Mot de Passe Actuel</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_password">Nouveau Mot de Passe</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Confirmer le Nouveau Mot de Passe</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Modifier le Mot de Passe</button>
        </div>
    </form>
</div>

    <script>
        document.getElementById('editImageBtn').addEventListener('click', function() {
            document.getElementById('image').click();
        });

        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
