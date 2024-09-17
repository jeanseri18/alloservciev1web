@extends('layouts.app')

@section('content')
<br>
<div class="container-fluid">
    <div class="row align-items-center mb-4">
        <!-- Colonne pour le titre -->
        <div class="col-md-9">
            <h3>Avis récents</h3>
        </div>
        
        <!-- Colonne pour le filtre -->
        <div class="col-md-3 text-md-right">
        <form method="GET" action="{{ route('avis.index') }}">
            <div class="form-group">
                <select id="filter" name="filter" class="form-control rounded" onchange="this.form.submit()">
                    <option value="all" {{ request('filter') === 'all' ? 'selected' : '' }}>Tous les avis</option>
                    <option value="today" {{ request('filter') === 'today' ? 'selected' : '' }}>Aujourd'hui</option>
                    <option value="week" {{ request('filter') === 'week' ? 'selected' : '' }}>Cette semaine</option>
                    <option value="month" {{ request('filter') === 'month' ? 'selected' : '' }}>Les trois derniers mois</option>
                </select>
            </div>
        </form>
        </div>
    </div>

    @if($avis->isEmpty())
        <p>Aucun avis trouvé.</p>
    @else
        <div class="row">
            @foreach($avis as $avisItem)
                <div class="col-md-12 mb-4"> <!-- Ajusté pour prendre 3/4 de largeur -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Initiales dans un cercle -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center" style="background-color: #0470B8; color: white; width: 50px; height: 50px; font-size: 24px;">
                                    {{ strtoupper(substr($avisItem->nom, 0, 1)) }}
                                </div>
                                <div class="ml-4"> <!-- Marges ajoutées -->
                                    <h5 class="card-title mb-1">{{ $avisItem->nom }}</h5>
                                    <p class="card-text mb-1">{{ $avisItem->tel }}</p>
                                </div>
                            </div>
                            <!-- Détail du message -->
                            <p class="card-text">{{ $avisItem->detail_message }}</p>
                            <!-- Étoiles -->
                            <div>
                                @for($i = 1; $i <= 5; $i++)
                                    <ion-icon name="{{ $i <= $avisItem->nbre_etoile ? 'star' : 'star-outline' }}" style="font-size: 24px; color: #E67136;"></ion-icon>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
