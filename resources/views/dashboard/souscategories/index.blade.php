@extends('layouts.app')

@section('title', 'Sous-catégories')

@section('content')
<div class="container">

   <br>
    <div class="row">
        <div class="col-md-9">
            <h3 class="mb-4">Liste des sous-categories</h3>
</div>
                <div class="col-md-3">    <a href="{{ route('souscategories.create') }}" class="btn btn-primary mb-3">Ajouter une sous-catégorie</a>
</div></div><hr>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- DataTables Initialization -->
    <div class="table-responsive">
        <table id="souscategoriesTable" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Icon</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($souscategories as $souscategorie)
                    <tr>
                        <td>{{ $souscategorie->nom_souscategorie }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $souscategorie->icon) }}" alt="Icon" class="img-thumbnail" style="max-width: 100px;">
                        </td>
                        <td>{{ $souscategorie->categorie->nom }}</td>
                        <td>
                            <a href="{{ route('souscategories.edit', $souscategorie->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('souscategories.destroy', $souscategorie->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#souscategoriesTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
            "lengthMenu": [10, 25, 50, 75, 100],
            "language": {
                "search": "Filtre:",
                "lengthMenu": "Afficher _MENU_ par page",
                "zeroRecords": "No matching records found",
                "info": "Affichage de la page _PAGE_ sur _PAGES_",
                "infoEmpty": "pas de données",
                "infoFiltered": "(filtrer  _MAX_ total records)"
            },
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"B>>t<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: 'Sous-catégories Report',
                    text: '<i class="fas fa-copy"></i> copier',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'csvHtml5',
                    title: 'Sous-catégories Report',
                    text: '<i class="fas fa-file-csv"></i> CSV',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Sous-catégories Report',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Sous-catégories Report',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> imprimer',
                    className: 'btn btn-secondary btn-sm'
                },
             
            ],
            initComplete: function () {
                $('.dt-buttons').addClass('mb-3');
            }
        });
    });
</script>
@endsection