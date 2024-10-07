@extends('layouts.app')

@section('title', 'Utilisateurs')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-9">
            <h3 class="mb-4">Liste des utilisateurs</h3>
        </div>
        <div class="col-md-3">
            <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Ajouter un utilisateur</a>
        </div>
    </div>
    <hr>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- DataTables Initialization -->
    <div class="table-responsive">
        <table id="clientsTable" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Entreprise</th>
                    <th>Role</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->telephone }}</td>
                        <td>{{ $client->entreprise }}</td>
                        <td>{{ $client->roles}}</td>
                        <td>{{ $client->statut == 1 ?'active ':'inactive'}}</td>
                        <td>
                            <form action="{{ route('clients.deactivate', $client->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">Désactiver</button>
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
    $('#clientsTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        "lengthMenu": [10, 25, 50, 75, 100],
        "language": {
            "search": "Filtre:",
            "lengthMenu": "Afficher _MENU_ par page",
            "zeroRecords": "Aucun utilisateur trouvé",
            "info": "Affichage de la page _PAGE_ sur _PAGES_",
            "infoEmpty": "Pas de données",
            "infoFiltered": "(filtré à partir de _MAX_ enregistrements)"
        },
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"B>>t<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        buttons: [
            {
                extend: 'copyHtml5',
                title: 'Rapport des utilisateurs',
                text: '<i class="fas fa-copy"></i> Copier',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'csvHtml5',
                title: 'Rapport des utilisateurs',
                text: '<i class="fas fa-file-csv"></i> CSV',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'excelHtml5',
                title: 'Rapport des utilisateurs',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'pdfHtml5',
                title: 'Rapport des utilisateurs',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimer',
                className: 'btn btn-secondary btn-sm'
            },
        ],
        initComplete: function() {
            $('.dt-buttons').addClass('mb-3');
        }
    });
});
</script>
@endsection
