@extends('layouts.app')

@section('title', 'Liste des Professionnels')

@section('content')
<div class="container">
<br>
    <div class="row">
        <div class="col-md-9">
            <h3 class="mb-4">Liste des professionels</h3>
</div>
                <div class="col-md-3">    <a href="{{ route('professionnels.create') }}" class="btn btn-primary mb-3">Ajouter un professionnel</a>
                </div>
                </div><hr>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- DataTables Initialization -->
    <div class="table-responsive">
        <table id="professionnelsTable" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Domaine</th>
                    <th>Ville</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professionnels as $professionnel)
                    <tr>
                        <td>{{ $professionnel->nom }}</td>
                        <td>{{ $professionnel->domaine }}</td>
                        <td>{{ $professionnel->ville }}</td>
                        <td>{{ $professionnel->telephone }}</td>
                        <td>
                            <a href="{{ route('professionnels.show', $professionnel) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('professionnels.edit', $professionnel) }}" class="btn btn-warning btn-sm">Éditer</a>
                            <form action="{{ route('professionnels.destroy', $professionnel) }}" method="POST" style="display:inline;">
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
        $('#professionnelsTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
            "lengthMenu": [10, 25, 50, 75, 100],
            "language": {
                "search": "Filtrer les enregistrements :",
                "lengthMenu": "Afficher _MENU_ enregistrements par page",
                "zeroRecords": "Aucun enregistrement correspondant trouvé",
                "info": "Affichage de la page _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucun enregistrement disponible",
                "infoFiltered": "(filtré de _MAX_ enregistrements au total)"
            },
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"B>>t<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: 'Liste des Professionnels',
                    text: '<i class="fas fa-copy"></i> Copier',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'csvHtml5',
                    title: 'Liste des Professionnels',
                    text: '<i class="fas fa-file-csv"></i> CSV',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'excelHtml5',
                    title: 'Liste des Professionnels',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Liste des Professionnels',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Imprimer',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'colvis',
                    text: '<i class="fas fa-columns"></i> Visibilité des colonnes',
                    className: 'btn btn-secondary btn-sm'
                }
            ],
            initComplete: function () {
                $('.dt-buttons').addClass('mb-3');
            }
        });
    });
</script>
@endsection
