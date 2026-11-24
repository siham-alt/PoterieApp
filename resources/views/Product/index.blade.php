@extends('dashboard')

@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    /* Sidebar Styles */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 220px;
        height: 100vh;
        background-color: #343a40;
        color: #fff;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        z-index: 100;
    }

    .sidebar h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #fff;
    }

    .sidebar a {
        display: block;
        padding: 10px;
        color: #fff;
        text-decoration: none;
        margin: 10px 0;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .sidebar a:hover {
        background-color: #ec8200;
    }

    /* Main Content Styles */
    .main-content {
        margin-left: 20px; /* Give space for the sidebar */
        padding: 20px;
        width: calc(100% - 50px);
    }

    .container {
        max-width: 90%; /* Increase container width */
        margin: 0 auto;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .btn {
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-success {
        background-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-primary {
        background-color: #ec8200;
    }

    .btn-primary:hover {
        background-color: #c67c00;
    }

    .btn-danger {
        background-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .table-container {
        margin-top: 20px;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 15px; /* Increased padding for clarity */
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f9;
        color: #333;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .alert {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .action-buttons form {
        display: inline-block;
    }
    .btn-custom-size {
    padding: 9px 10px; /* Assure que la taille correspond */
    font-size: 16px;   /* Harmonise la taille du texte */
    height: 40px;      /* Ajuste la hauteur pour être identique */
    line-height: 1.2;  /* Centrage du texte */
}



    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            position: static;
            box-shadow: none;
        }

        .main-content {
            margin-left: 0;
            width: 100%;
        }
    }
</style>


<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <h1>Liste des Produits 
            <a href="{{ route('produits.create') }}" class="btn btn-success btn-custom-size">Ajouter</a>
        </h1>

        <div class="table-container">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Categorie</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->nom }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->prix }} dh</td>
                        <td>{{ $product->nb_existant }}</td>
                        <td>{{ $product->categorie->nom ?? 'Aucune catégorie' }}</td>
                        <td>
                        @if($product->image!="")
                        <img width="50" src="{{ asset('uploads/Product/'.$product->image) }}">
                        @endif
                    </td>
                        <td class="action-buttons">
                            <a href="{{ route('produits.edit', $product->id) }}" class="btn btn-primary btn-custom-size">Modifier</a>
                            <form action="{{ route('produits.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ">Supprimer</button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
