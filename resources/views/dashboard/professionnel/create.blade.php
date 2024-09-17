@extends('layouts.app')

@section('content')
    <h1>Ajouter un Professionnel</h1>

    <form action="{{ route('professionnels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="domaine">Domaine (Sous-catégorie)</label>
            <select name="domaine" id="domaine" class="form-control" required>
                @foreach($sousCategories as $sousCategorie)
                    <option value="{{ $sousCategorie->id }}">{{ $sousCategorie->nom_souscategorie }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="detail">Détail</label>
            <textarea name="detail" id="detail" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
