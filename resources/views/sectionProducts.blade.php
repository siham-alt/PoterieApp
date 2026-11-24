<style>
.featured-products {
    padding: 50px 20px;
    background-color: #f8f3ee;
    text-align: center;
}

.featured-products h2 {
    font-size: 2.5rem;
    margin-bottom: 30px;
    color: #5e4433;
    font-family: 'Arial', sans-serif;
    text-transform: uppercase;
}

.carousel-inner {
    margin-bottom: 20px;
}

.product-card {
    background: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 10px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.product-card img {
    width: 100%;
    height: 300px; /* Augmentez la hauteur ici */
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 15px;
}

.product-card h5 {
    margin: 10px 0;
    font-weight: bold;
    color: #5e4433;
    font-family: 'Arial', sans-serif;
}

.product-card p {
    color: #c46c00;
    font-size: 1.2rem;
    margin-bottom: 10px;
    font-family: 'Georgia', serif;
}

.btn-view-more {
    margin-top: 20px;
    background-color: #5e4433;
    color: white;
    padding: 12px 25px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-view-more:hover {
    background-color: #c46c00;
    transform: scale(1.05);
}

/* Carousel Control Styling */
.carousel-control-prev-icon, .carousel-control-next-icon {
    background-color: #5e4433;
    border-radius: 50%;
    padding: 10px;
}

.carousel-control-prev-icon:hover, .carousel-control-next-icon:hover {
    background-color: #c46c00;
}
</style>


<!-- Featured Products Section -->
<div class="featured-products">
    <h2>Nos nouveautés</h2>
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($featuredProducts->chunk(2) as $chunk)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="row justify-content-center">
                        @foreach ($chunk as $product)
                            <div class="col-md-4 product-card">
                                <img src="{{ asset('uploads/Product/'.$product->image) }}" class="product-image" alt="{{ $product->nom }}">
                                <h5>{{ $product->nom }}</h5>
                                <p>{{ number_format($product->prix, 2) }}Dh</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- View More Button -->
    <a href="{{ route('produits.show') }}" class="btn-view-more">Voir plus</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
