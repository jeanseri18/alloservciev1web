@extends('layouts.app')

@section('content')<br>
   
    <div class="row container">
      
                <div class="col-md-8 card  mb-4"> <br><h3>Ajouter un Horaire</h3>
<hr/>
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
        </div><br>
        <div class="form-group">
            <label for="heure_ouverture">Heure d'Ouverture</label>
            <input type="time" name="heure_ouverture" id="heure_ouverture" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label for="heure_fermeture">Heure de Fermeture</label>
            <input type="time" name="heure_fermeture" id="heure_fermeture" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label for="statut_ouverture">Statut d'Ouverture</label>
            <select name="statut_ouverture" id="statut_ouverture" class="form-control" required>
                <option value="1">Ouvert</option>
                <option value="0">Fermé</option>
            </select>
        </div><br>
        <button type="submit" class="btn btn-primary">Enregistrer</button></br>
    </form><br><br></div>   <br>
        <div class="col-md-4">
</div></div>
              
@endsection
