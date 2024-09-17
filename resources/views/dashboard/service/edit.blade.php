@extends('layouts.app')

@section('content')
    <h1>Éditer un Service</h1>

    <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $service->nom) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $service->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            @if($service->image)
                <div>
                    <img src="{{ asset('storage/images/' . $service->image) }}" alt="Image" style="max-width: 150px;">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
