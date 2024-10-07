@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
<br>
<div class="row container">

<div class="col-md-8 card"><br>
       

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <h3>Ajout de categorie </h3><hr/>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div><br>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div><br>

            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <select class="form-select" id="status" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div><br>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <br>
            <br>
            </form>
        </div>
<div class="col-md-4">
</div>
</div>@endsection
