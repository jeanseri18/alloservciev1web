@extends('layouts.app')

@section('content')
<br>
<div class="row container">

<div class="col-md-8 card">


    <form action="{{ route('professionnels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <br>
        <h3>Ajouter un Professionnel</h3>
        <hr/>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label for="domaine">Domaine (Sous-catégorie)</label>
            <select name="domaine" id="domaine" class="form-control" required>
                @foreach($sousCategories as $sousCategorie)
                    <option value="{{ $sousCategorie->id }}">{{ $sousCategorie->nom_souscategorie }}</option>
                @endforeach
            </select>
        </div><br>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label for="commune">Commune</label>
            <input type="text" name="commune" id="commune" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label for="prixprestation">Prix de la prestation</label>
            <input type="text" name="prixprestation" id="prixprestation" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label for="detail">Détail</label>
            <textarea name="detail" id="detail" class="form-control"></textarea>
        </div><br>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div><br>
        <button type="submit" class="btn btn-primary">Enregistrer</button><br><br>
    </form>
</div>
<div class="col-md-4">
</div>
</div>
@endsection
