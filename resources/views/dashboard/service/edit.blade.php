@extends('layouts.app')

@section('content')
    
<br>
<div class="row container">

<div class="col-md-8 card">
    <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')<hr/>
        <div class="form-group">
            <label for="nom">Nom</label>
            <!--input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $service->nom) }}" required-->
            <select name="nom" class="form-control" required>
        @foreach($corpsmetiers as $corpsmetier)
        <option value="{{ $corpsmetier->nom }}" {{ $corpsmetier->nom == $service->nom ? 'selected' : '' }}>
                    {{ $corpsmetier->nom }}
                </option>
        @endforeach
                </select>
        </div><br>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $service->description) }}</textarea>
        </div><br>
        <div class="form-group">
            <label for="image">Image</label>
            @if($service->image)
                <div>
                    <img src="{{ asset('storage/images/' . $service->image) }}" alt="Image" style="max-width: 150px;">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div><br>
        <br><br>  <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form></div>
<div class="col-md-4">
</div>
</div>
@endsection
