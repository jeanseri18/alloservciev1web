@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<br>
<div class="row container">

<div class="col-md-8 card"><br>
       

        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <h3>Modification d'une categorie</h3><hr>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $category->nom) }}" required>
            </div><br>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" style="width: 100px;" class="mt-2">
                @endif
            </div><br>

            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <select class="form-select" id="status" name="status">
                    <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$category->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div><br>

            <button type="submit" class="btn btn-primary">Modifier</button>
            <br>
            <br>
            </form>
    </div></div>
<div class="col-md-4">
</div>
</div>
@endsection
