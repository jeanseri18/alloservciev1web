@extends('layouts.public')

@section('title', 'Annuaire | Geeks')

@section('content')
<section class="bg-light"
    style="background: linear-gradient(to right top, #0470B8, #023252), no-repeat right; background-size: auto; background-position: right; height: 300px;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 text-center">
                <h1 class="display-2 text-white">ANNUAIRE</h1>
            </div>
           
        </div>
    </div>
</section>

<div class="container mt-5">
<div class="container " style="background:#0470B843; padding: 20px; border-radius: 8px;">
    <form action="{{ route('annuaire.index') }}" method="GET">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Rechercher une entreprise ou un professionnel" value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Rechercher</button>
            </div>
        </div>
    </form></div>

    <div class="row mt-5">
        <div class="col-md-12">
            <ul class="list-group">
            @if($results->isNotEmpty())
    @foreach($results as $result)
        <li class="list-group-item">
            @if($result->type == 'Entreprise')
                <strong>{{ $result->nom }}</strong><br>
                <em>{{ $result->type }}</em><br>
                Nom du représentant : {{ $result->nomorville }}<br>
                Adresse : {{ $result->adresse }}<br>
                Téléphone : {{ $result->telephone }}
            @elseif($result->type == 'Professionnel')
                <strong>{{ $result->nom }}</strong><br>
                <em>{{ $result->type }}</em><br>
                Ville : {{ $result->nomorville }}<br>
                Métier : {{ $result->domaine }}<br>
                Téléphone : {{ $result->telephone }}
            @endif
        </li>
    @endforeach
@else
    <p>Aucun résultat trouvé.</p>
@endif

            </ul>
           
        </div>
    </div>
</div>
<br>
<div class="d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        <!-- Lien Previous -->
                        @if ($results->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Précédent</span></li>
                        @else
                        <li class="page-item">
                            <a class="page-link"
                                href="{{ $results->appends(request()->input())->previousPageUrl() }}"
                                rel="prev">Précédent</a>
                        </li>
                        @endif

                        <!-- Numéros de pages -->
                        @foreach ($results->getUrlRange(1, $results->lastPage()) as $page => $url)
                        @if ($page == $results->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link"
                                href="{{ $results->appends(request()->input())->url($page) }}">{{ $page }}</a>
                        </li>
                        @endif
                        @endforeach

                        <!-- Lien Next -->
                        @if ($results->hasMorePages())
                        <li class="page-item">
                            <a class="page-link"
                                href="{{ $results->appends(request()->input())->nextPageUrl() }}"
                                rel="next">Suivant</a>
                        </li>
                        @else
                        <li class="page-item disabled"><span class="page-link">Suivant</span></li>
                        @endif
                    </ul>
                </nav>
            </div>

@endsection
