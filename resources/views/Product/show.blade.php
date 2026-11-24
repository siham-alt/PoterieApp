<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        .product-info {
            padding: 15px;
            text-align: center;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        .product-price {
            font-size: 1rem;
            color: #ea9c65;
            font-weight: bold;
        }

        .product-card {
            position: relative;
            overflow: hidden;
            border: none;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2); 
            cursor: pointer;
        }
        
   


        .product-image {
            width: 100%;
            height: auto;
            aspect-ratio: 1,5 / 3; /* Aspect ratio of width greater than height (3:2) */
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .details-btn {
        position: absolute;
        bottom: 50%;
        left: 50%;
        transform: translate(-50%, 50%);
        background-color: rgba(255, 255, 255, 0.8);
        color: #333;
        border: 2px solid #ea9c65;
        padding: 10px 20px;
        border-radius: 30px;
        text-transform: uppercase;
        font-size: 0.9rem;
        font-weight: bold;
        letter-spacing: 1px;
        text-decoration: none;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }

    .details-btn:hover {
        background-color: #ea9c65;
        color: white;
        border-color: #ea9c65;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        transform: translate(-50%, 40%) scale(1.05);
    }

    /* Show the button on hover */
    .product-card:hover .details-btn {
        opacity: 1;
        visibility: visible;
        bottom: 40%;
        transform: translate(-50%, 0);
    }

        /* Pagination styles */
        .pagination {
            justify-content: center;
            margin-top: 30px;
        }

    </style>
</head>
<body>

@include('layouts/header')

<div class="container">
    <h1 class="text-center mb-4">Produits</h1>

    <!-- Filtrer et Trier -->
    <div class="d-flex justify-content-between align-items-center mb-4">
    <form action="{{ route('produits.show') }}" method="GET" class="d-flex justify-content-between align-items-center mb-4">
    <select class="form-select w-auto" name="category" onchange="this.form.submit()">
        <option value="" selected>Tous les Produits</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                {{ $category->nom }}
            </option>
        @endforeach
    </select>
</form>

    </div>

    <!-- Grille de Produits -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Product Cards -->
        @foreach($products as $product)
        <div class="col">
    <div class="product-card">
        <!-- Image du produit -->
        @if($product->image)
            <img src="{{ asset('uploads/Product/'.$product->image) }}" class="product-image" alt="{{ $product->nom }}">
        @else
            <img src="https://via.placeholder.com/500" class="product-image" alt="Image indisponible">
        @endif

        <!-- Bouton Details -->
        <a href="{{ route('product.details', ['id' => $product->id]) }}" class="details-btn">Details</a>
    </div>

    <div class="product-info">
        <h5 class="product-title">{{ $product->nom }}</h5>
        <p class="product-price">{{ $product->prix }} DH</p>
    </div>
</div>
        @endforeach
    </div>

    <!-- Pagination -->
   <!-- Pagination -->
<nav>
    <ul class="pagination justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </ul>
</nav>


</div>

@include('layouts/footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
