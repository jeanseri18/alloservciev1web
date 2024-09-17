@extends('layouts.app')

@section('content')
    <h1>Ajouter un Horaire</h1>

    <form action="{{ route('horaires.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jour_semaine">Jour de la Semaine</label>
            <select name="jour_semaine" id="jour_semaine" class="form-control" required>
                <option value="">Sélectionner un jour</option>
                <option value="Lundi">Lundi</option>
                <option value="Mardi">Mardi</option>
                <option value="Mercredi">Mercredi</option>
                <option value="Jeudi">Jeudi</option>
                <option value="Vendredi">Vendredi</option>
                <option value="Samedi">Samedi</option>
                <option value="Dimanche">Dimanche</option>
            </select>
        </div>
        <div class="form-group">
            <label for="heure_ouverture">Heure d'Ouverture</label>
            <input type="time" name="heure_ouverture" id="heure_ouverture" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="heure_fermeture">Heure de Fermeture</label>
            <input type="time" name="heure_fermeture" id="heure_fermeture" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="statut_ouverture">Statut d'Ouverture</label>
            <select name="statut_ouverture" id="statut_ouverture" class="form-control" required>
                <option value="1">Ouvert</option>
                <option value="0">Fermé</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
