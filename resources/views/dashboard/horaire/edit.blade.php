@extends('layouts.app')

@section('content')
<br>
<div class="row container">

<div class="col-md-8 card">

    <form action="{{ route('horaires.update', $horaire) }}" method="POST">
        @csrf
        @method('PUT') <br> <h1>Éditer un Horaire</h1><hr/>
        <div class="form-group">
            <label for="jour_semaine">Jour de la Semaine</label>
            <select name="jour_semaine" id="jour_semaine" class="form-control" required>
                <option value="">Sélectionner un jour</option>
                <option value="Lundi" {{ old('jour_semaine', $horaire->jour_semaine) == 'Lundi' ? 'selected' : '' }}>Lundi</option>
                <option value="Mardi" {{ old('jour_semaine', $horaire->jour_semaine) == 'Mardi' ? 'selected' : '' }}>Mardi</option>
                <option value="Mercredi" {{ old('jour_semaine', $horaire->jour_semaine) == 'Mercredi' ? 'selected' : '' }}>Mercredi</option>
                <option value="Jeudi" {{ old('jour_semaine', $horaire->jour_semaine) == 'Jeudi' ? 'selected' : '' }}>Jeudi</option>
                <option value="Vendredi" {{ old('jour_semaine', $horaire->jour_semaine) == 'Vendredi' ? 'selected' : '' }}>Vendredi</option>
                <option value="Samedi" {{ old('jour_semaine', $horaire->jour_semaine) == 'Samedi' ? 'selected' : '' }}>Samedi</option>
                <option value="Dimanche" {{ old('jour_semaine', $horaire->jour_semaine) == 'Dimanche' ? 'selected' : '' }}>Dimanche</option>
            </select>
        </div><br>
        <div class="form-group">
            <label for="heure_ouverture">Heure d'Ouverture</label>
            <input type="time" name="heure_ouverture" id="heure_ouverture" class="form-control" value="{{ old('heure_ouverture', $horaire->heure_ouverture) }}" required>
        </div><br>
        <div class="form-group">
            <label for="heure_fermeture">Heure de Fermeture</label>
            <input type="time" name="heure_fermeture" id="heure_fermeture" class="form-control" value="{{ old('heure_fermeture', $horaire->heure_fermeture) }}" required>
        </div><br>
        <div class="form-group">
            <label for="statut_ouverture">Statut d'Ouverture</label>
            <select name="statut_ouverture" id="statut_ouverture" class="form-control" required>
                <option value="1" {{ old('statut_ouverture', $horaire->statut_ouverture) == 1 ? 'selected' : '' }}>Ouvert</option>
                <option value="0" {{ old('statut_ouverture', $horaire->statut_ouverture) == 0 ? 'selected' : '' }}>Fermé</option>
            </select>
        </div><br>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <br><br> </form></div>
<div class="col-md-4">
</div>
</div>
@endsection
