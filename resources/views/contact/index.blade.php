@extends('dashboard')
@section('content')

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5; /* Couleur d'arrière-plan douce */
        color: #333;
    }

    .container {
        margin-top: 40px;
        margin-bottom: 40px;
    }

    h1 {
        text-align: center;
        color: #6c757d; /* Gris doux */
        font-weight: bold;
        margin-bottom: 20px;
    }

    .card {
        border-radius: 15px;
        border: none;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
    }

    .card-header {
        background-color: #e27326; /* Gris foncé */
        color: #fff;
        border-radius: 15px 15px 0 0;
        font-weight: bold;
        padding: 15px;
    }

    .card-body {
        background-color: #fff;
        border-radius: 0 0 15px 15px;
        padding: 25px;
    }

    .table {
        margin: 0;
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    .thead-light th {
        background-color: #f8f9fa; /* Gris clair pour l'en-tête */
        color: #495057;
        font-weight: bold;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1; /* Effet hover doux */
    }
    .table td {
        padding: 15px; /* Ajoute de l'espace autour du contenu dans les cellules */
    }

    .table tbody tr {
        margin-bottom: 10px; /* Ajoute de l'espace entre les lignes */
        border-bottom: 1px solid #ddd; /* Ajoute une ligne entre les messages pour plus de lisibilité */
    }

    .table tbody tr + tr {
        margin-top: 10px;
    }

    .alert {
        margin-top: 20px;
        border-radius: 12px;
        background-color: #d4edda; /* Vert clair */
        border-color: #c3e6cb;
        color: #155724;
        font-size: 16px;
    }

    .badge {
        font-size: 0.9rem;
        padding: 5px 10px;
        border-radius: 12px;
    }

    .badge-primary {
        background-color: #924814;
        color: #fff;
    }

    .badge-secondary {
        background-color: #f0b68e;
        color: #fff;
    }

    .badge-success {
        background-color: #28a745;
        color: #fff;
    }

    .text-center {
        margin-top: 15px;
    }
</style>

<div class="container">

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm mt-4">
        <div class="card-header text-center">
            Liste des Messages
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <td><span class="badge badge-primary">{{ $message->name }}</span></td>
                            <td><span class="badge badge-secondary">{{ $message->email }}</span></td>
                            <td>{{ $message->message }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
