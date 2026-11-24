<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Produit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f5f0; /* Beige pour rappeler la céramique */
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .form-header {
            background-color: #a97155; /* Marron clair */
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .form-control {
            border: 1px solid #a97155; /* Border marron */
            border-radius: 5px;
            height: 45px;
        }
        .btn-success {
            background-color: #a97155; /* Marron clair */
            border: none;
            transition: all 0.3s ease-in-out;
        }
        .btn-success:hover {
            background-color: #8b5e45; /* Marron plus foncé */
        }
    </style>
</head>
<body>
@extends('dashboard')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="form-container">
        <div class="form-header">
            <h2>Modifier un Produit</h2>
        </div>
        <form action="{{ route('produits.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
    <label for="nom" class="form-label">Nom du produit</label>
    <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $product->nom) }}" required>
</div>
<div class="form-group mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
</div>
<div class="form-group mb-3">
    <label for="prix" class="form-label">Prix</label>
    <input type="number" name="prix" id="prix" class="form-control" value="{{ old('prix', $product->prix) }}" step="0.01" required>
</div>
<div class="form-group mb-3">
    <label for="nb_existant" class="form-label">Nombre existant</label>
    <input type="number" name="nb_existant" id="nb_existant" class="form-control" value="{{ old('nb_existant', $product->nb_existant) }}" step="1" required>
</div>
<div class="form-group mb-3">
    <label for="categories_id" class="form-label">Catégorie</label>
    <select name="categories_id" id="categories_id" class="form-control" required>
        <option value="" disabled>Choisir une catégorie</option>
        @foreach($categories as $categorie)
            <option value="{{ $categorie->id }}" {{ $categorie->id == old('categories_id', $product->categories_id) ? 'selected' : '' }}>
                {{ $categorie->nom }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="image" id="image" class="form-control">
</div>

            <div class="text-center">
                <button type="submit" class="btn btn-success px-5">Modifier</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection