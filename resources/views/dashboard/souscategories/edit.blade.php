@extends('layouts.app')

@section('content')
    <h1>Éditer un Professionnel</h1>

    <form action="{{ route('dashboard.professionnel.update', $professionnel) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $professionnel->nom) }}" required>
        </div>
        <div class="form-group">
            <label for="domaine">Domaine (Sous-catégorie)</label>
            <select name="domaine" id="domaine" class="form-control" required>
                @foreach($sousCategories as $sousCategorie)
                    <option value="{{ $sousCategorie->id }}" {{ $sousCategorie->id == $professionnel->domaine ? 'selected' : '' }}>
                        {{ $sousCategorie->nom_souscategorie }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" value="{{ old('ville', $professionnel->ville) }}" required>
        </div>
        <div class="form-group">
            <label for="detail">Détail</label>
            <textarea name="detail" id="detail" class="form-control">{{ old('detail', $professionnel->detail) }}</textarea>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value
