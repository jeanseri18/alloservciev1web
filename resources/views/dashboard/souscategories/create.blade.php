@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une Sous-catégorie</h1>
    <form action="{{ route('souscategories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nom_souscategorie" class="form-label">Nom de la Sous-catégorie</label>
            <input type="text" class="form-control" id="nom_souscategorie" name="nom_souscategorie" required>
        </div>
        <div class="mb-3">
            <label for="icon" class="form-label">Icon</label>
            <input type="file" class="form-control" id="icon" name="icon">
        </div>
        <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select class="form-select" id="categorie_id" name="categorie_id" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
