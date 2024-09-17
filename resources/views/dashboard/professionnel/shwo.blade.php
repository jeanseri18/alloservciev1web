@extends('layouts.app')

@section('content')
    <h1>Professionnel</h1>

    <p><strong>Nom:</strong> {{ $professionnel->nom }}</p>
    <p><strong>Domaine:</strong> {{ $professionnel->domaine }}</p>
    <p><strong>Ville:</strong> {{ $professionnel->ville }}</p>
    <p><strong>Détails:</strong> {{ $professionnel->detail }}</p>
    <p><strong>Téléphone:</strong> {{ $professionnel->telephone }}</p>

    @if($professionnel->image)
        <div>
            <img src="{{ asset('storage/images/' . $professionnel->image) }}" alt="Image" style="max-width: 150px;">
        </div>
    @endif

    <a href="{{ route('professionnels.index') }}" class="btn btn-primary">Retour à la liste</a>
    <a href="{{ route('professionnels.edit', $professionnel) }}" class="btn btn-warning">Éditer</a>
    <form action="{{ route('professionnels.destroy', $professionnel) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
@endsection
