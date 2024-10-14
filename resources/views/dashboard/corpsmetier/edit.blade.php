@extends('layouts.app')

@section('content')

<br>
<div class="row container">
      <br>
      <br>
      <div class="col-md-8 card  mb-4"> <br>
        <h3>
        Modifier le Corps de Métier : {{ $corpsmetier->nom }}</h3>
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

        <form action="{{ route('corpsmetier.update', $corpsmetier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom', $corpsmetier->nom) }}" required>
            </div>

            <div class="form-group">
                <label for="id_souscat">Sous-catégorie</label>
                <select name="id_souscat" class="form-control" required>
        @foreach($souscategories as $souscategorie)
        <option value="{{ $souscategorie->id }}" {{ $corpsmetier->id_souscat == $souscategorie->id ? 'selected' : '' }}>
                    {{ $souscategorie->nom_souscategorie }}
                </option>
        @endforeach
                </select>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form><br>
    </div>
@endsection
