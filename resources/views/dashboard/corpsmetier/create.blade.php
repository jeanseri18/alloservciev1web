@extends('layouts.app')

@section('content')
<br>

<div class="row container">
      <br>
      <br>
      <div class="col-md-8 card  mb-4"> <br>
        <h3>Ajouter un Corps de Métier</h3>
        <hr/>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('corpsmetier.store') }}" method="POST">
            @csrf
      
<br>
            <div class="form-group">
                <label for="nom">Nom du corps de metier</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
            </div>
            <div class="form-group">
                <label for="id_souscat">Sous-catégorie</label>
                <select name="id_souscat" class="form-control" required>
                    <!-- Remplir avec les sous-catégories disponibles -->
                    @foreach($souscategories as $souscategorie)
                        <option value="{{ $souscategorie->id }}">{{ $souscategorie->nom_souscategorie }}</option>
                    @endforeach
                </select>
            </div>
           
<br>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    <br><br></div>   <br>
        <div class="col-md-4">
</div></div>
@endsection
