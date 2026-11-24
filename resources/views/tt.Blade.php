<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
        }

        .header {
            background-color: white;
            padding: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header .nav-link {
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0 15px;
        }

        .header .nav-link:hover {
            color: #ea9c65;
        }

        .products-container {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .product-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    }

    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .product-info {
        text-align: center;
        margin-top: 15px;
    }

    .product-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 1.1rem;
        color: #ea9c65;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .product-btn {
        background-color: #ea9c65;
        color: white;
        font-weight: bold;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        text-transform: uppercase;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .product-btn:hover {
        background-color: #e57b47;
    }

        .pagination {
            justify-content: center;
        }

       
    </style>
</head>
<body>
@include('layouts/header')

    <!-- Products Grid -->
   
<div class="container products-container">
    <h1 class="text-center mb-4">Produits</h1>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <select class="form-select w-auto">
            <option value="/products" selected>Toutes les catégories</option>
            @if($categories->isEmpty())
                <option disabled>Aucune catégorie disponible</option>
            @else
                @foreach($categories as $category)
                    <option value="/products?category={{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            @endif
        </select>
    </div>

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
                </div>
                <!-- Informations du produit -->
                <div class="product-info">
                    <h5 class="product-title">{{ $product->nom }}</h5>
                    <p class="product-price">{{ $product->prix }} DH</p>
                    <a href="{{ route('product.details', ['id' => $product->id]) }}" class="product-btn">Détails</a>
                </div>
            </div>
        @endforeach
    </div>

    <nav>
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#">Previous</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
</div>

    <!-- Footer -->
   @include('layouts/footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
