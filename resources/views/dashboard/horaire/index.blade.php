@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<div class="container">
    <h1>Horaires</h1>
    <a href="{{ route('horaires.create') }}" class="btn btn-primary mb-3">Ajouter un Horaire</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Jour de la Semaine</th>
                <th>Heure d'Ouverture</th>
                <th>Heure de Fermeture</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horaires as $horaire)
                <tr>
                    <td>{{ $horaire->jour_semaine }}</td>
                    <td>{{ $horaire->heure_ouverture }}</td>
                    <td>{{ $horaire->heure_fermeture }}</td>
                    <td>
                        <!-- Toggle Switch -->
                        <form action="{{ route('horaires.toggleStatus', $horaire) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <label class="switch">
                                <input type="checkbox" 
                                       name="statut_ouverture"
                                       id="toggle-status-{{ $horaire->id }}" 
                                       {{ $horaire->statut_ouverture ? 'checked' : '' }}
                                       onchange="this.form.submit()">
                                <span class="slider round"></span>
                            </label>
                        </form>
                    </td>
                    <td>
                      <!-- Action Buttons with Icons -->
                      <a href="{{ route('horaires.show', $horaire) }}" class="btn btn-info btn-sm" title="Voir">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('horaires.edit', $horaire) }}" class="btn btn-warning btn-sm" title="Éditer">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('horaires.destroy', $horaire) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')" title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


