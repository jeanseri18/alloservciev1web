@extends('layouts.app')

@section('content')
    <h1>Détails de l'Horaire</h1>

    <div>
        <strong>Jour de la Semaine :</strong> {{ $horaire->jour_semaine }}
    </div>
    <div>
        <strong>Heure d'Ouverture :</strong> {{ $horaire->heure_ouverture }}
    </div>
    <div>
        <strong>Heure de Fermeture :</strong> {{ $horaire->heure_fermeture }}
    </div>
    <div>
        <strong>Statut d'Ouverture :</strong> {{ $horaire->statut_ouverture ? 'Ouvert' : 'Fermé' }}
    </div>
    <a href="{{ route('horaires.index') }}" class="btn btn-secondary">Retour</a>
@endsection
