@extends('layouts.app')

@section('content')
<br>
<div class="row container">
    <div class="col-md-8 card">
        <form action="{{ route('souscategories.update', $souscategorie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <br>
            <h3>Modifier une sous-catégorie</h3><hr/>

            <!-- Nom de la sous-catégorie -->
            <div class="">
                <label for="nom_souscategorie" class="form-label">Nom de la Sous-catégorie</label>
                <input type="text" class="form-control" id="nom_souscategorie" name="nom_souscategorie" value="{{ old('nom_souscategorie', $souscategorie->nom_souscategorie) }}" required>
            </div><br>

            <!-- Icone -->
            <div class="">
                <label for="icon" class="form-label">Icon</label>
                <input type="file" class="form-control" id="icon" name="icon">
                @if($souscategorie->icon)
                    <small class="form-text text-muted">Icône actuelle : <img src="{{ asset('storage/'.$souscategorie->icon) }}" alt="Icone actuelle" style="width: 50px;"></small>
                @endif
            </div><br>

            <!-- Catégorie -->
            <div class="">
                <label for="categorie_id" class="form-label">Catégorie</label>
                <select class="form-select" id="categorie_id" name="categorie_id" required>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $souscategorie->categorie_id == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->nom }}
                        </option>
                    @endforeach
                </select>
            </div><br>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <br><br>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection
