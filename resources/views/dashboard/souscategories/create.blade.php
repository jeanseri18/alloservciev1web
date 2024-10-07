@extends('layouts.app')

@section('content')
<br>
<div class="row container">

<div class="col-md-8 card">   
    <form action="{{ route('souscategories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <br>
        <h3>Ajouter une sous categorie</h3><hr/>
    
        <div class="">
            <label for="nom_souscategorie" class="form-label">Nom de la Sous-catégorie</label>
            <input type="text" class="form-control" id="nom_souscategorie" name="nom_souscategorie" required>
        </div><br>

        <div class="">
            <label for="icon" class="form-label">Icon</label>
            <input type="file" class="form-control" id="icon" name="icon">
        </div><br>

        <div class="">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select class="form-select" id="categorie_id" name="categorie_id" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div><br>

        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
   <br><br> </form>
    </div>
<div class="col-md-4">
</div>
</div>
@endsection
