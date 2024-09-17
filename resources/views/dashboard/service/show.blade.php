@extends('layouts.app')

@section('content')
    <h1>Détails du Service</h1>

    <div>
        <strong>Nom :</strong> {{ $service->nom }}
    </div>
    <div>
        <strong>Description :</strong> {{ $service->description }}
    </div>
    <div>
        <strong>Image :</strong>
        @if($service->image)
            <div>
                <img src="{{ asset('storage/images/' . $service->image) }}" alt="Image" style="max-width: 300px;">
            </div>
        @endif
    </div>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Retour</a>
@endsection
