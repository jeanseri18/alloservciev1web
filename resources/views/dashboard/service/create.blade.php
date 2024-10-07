@extends('layouts.app')

@section('content')
<br>
<div class="row container">

<div class="col-md-8 card">
   

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Ajouter un Service</h3><hr/>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div><br>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div><br>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <br><br>  </form></div>
<div class="col-md-4">
</div>
</div>
@endsection
