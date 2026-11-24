<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .product-page {
            background-color: white;
            padding: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            max-width: 100%;
            border-radius: 10px;
        }

        .product-title {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ea9c65;
        }

        .description {
            font-size: 1rem;
            color: #333;
            margin-top: 20px;
        }

        .add-to-cart-btn {
            background-color: #ea9c65;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .related-products img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .review-section {
            background-color: #f3f3f3;
            padding: 20px;
            margin-top: 40px;
            border-radius: 10px;
        }

        .review-author {
            font-weight: bold;
            color: #333;
        }

        .review-date {
            color: #888;
            font-size: 0.9rem;
        }

        .review-stars {
            color: #ea9c65;
        }

        .related-products .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .related-products {
            margin-top: 40px;
        }
    

    /* Bouton Details */
    .btn-details {
        background-color: #ea9c65;
        color: white;
        border-color: #ea9c65;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-details:hover {
        background-color: #d57c40;
        border-color: #d57c40;
        transform: scale(1.05);
    }
</style>
</head>
<body>

@include('layouts/header')


<br><br>
<div class="container product-page">
    <div class="row">
        <div class="col-md-6">
        <img src="{{ asset('uploads/Product/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
        </div>
        <div class="col-md-6">@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif
        <h2 class="product-title">{{ $product->nom }}</h2>
            <p class="product-price">{{ $product->prix }} DH</p>
            <p class="description">{{ $product->description }}</p>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantite</label>
                <input type="number" class="form-control" id="quantity" value="1" min="1">
            </div>
            <form action="{{ route('panier.ajouter') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="quantite" id="quantity-input" value="1">
    <button type="submit" class="btn btn-details">Ajouter au Panier</button>
</form>



        </div>
    </div>

    <h3 class="mt-5">Produits similaires</h3>
    <div class="row related-products">
        @foreach($relatedProducts as $relatedProduct)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('uploads/Product/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="card-img-top">
                <div class="card-body">
                    <p class="card-text">{{ $relatedProduct->nom }}</p>
                    <p class="card-text">{{ $relatedProduct->prix }} DH</p>
                    <a href="{{ route('product.details', $relatedProduct->id) }}" class="btn btn-details"> Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script><br><br><br>
@include('layouts/footer')
</body>
</html>
