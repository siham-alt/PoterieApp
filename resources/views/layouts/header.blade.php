<!-- Ajouter le lien vers Font Awesome pour l'icône du panier -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>



<style>
         

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


        
    .cart-icon {
        font-size: 1.5rem;
        color: #5e4433;
        cursor: pointer;
        transition: color 0.3s;
    }

    .cart-icon:hover {
        color: #ea9c65;
    }

    .cart-badge {
        position: absolute;
        top: -5px;
        right: -10px;
        background-color: #ea9c65;
        color: white;
        font-size: 0.8rem;
        padding: 3px 8px;
        border-radius: 50%;
    }



    .navbar-nav {
    margin-left: 1rem; /* Réduit l'espace entre le logo et les éléments */
    gap: 1rem; /* Ajuste l'espace entre chaque lien */
}

.navbar-brand {
    font-size: 1.8rem; /* Augmente légèrement la taille du logo */
    font-weight: bold;
    color: #ea9c65; /* Donne une couleur distinctive au logo */
    text-transform: uppercase; /* Met en majuscules le texte du logo */
    font-family: 'Georgia', serif; /* Police élégante pour le logo */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Ajoute un léger ombrage */
}

.navbar-brand:hover {
    color: #5e4433; /* Change la couleur au survol */
    text-decoration: none; /* Supprime le soulignement au survol */
}


.shop-btn {
    background-color: #ea9c65; /* Couleur principale */
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    transition: all 0.3s ease; /* Animation fluide */
    font-size: 1rem;
    margin-left: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ajout d'une ombre */
    text-decoration: none; /* Supprime les soulignements */
}

.shop-btn:hover {
    background-color: #e57b47; /* Couleur au survol */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); /* Accentue l'ombre */
    transform: translateY(-2px); /* Légère translation vers le haut */
}

.shop-btn:active {
    transform: translateY(2px); /* Effet "pressé" */
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
}

</style>

<body><header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <!-- Logo mis à jour -->
        <a class="navbar-brand" href="#">Mon<span style="color: #5e4433;">At</span></a> <a href="{{ route('paniers.index') }}" class="cart-icon position-relative">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-badge">{{ $cartCount ?? 0 }}</span>
            </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('produits.show') }}">Produits</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ateliers</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('commandes.voir') }}">Mes commandes</a></li>
            </ul>
            <div class="auth-links">
                @auth
                <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="userMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="userMenuButton">
        @if (Auth::user()->is_admin == 1)
            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
        @endif
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Se déconnecter
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>

                @else
                <a href="{{ route('login') }}" class="shop-btn">Se connecter</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="shop-btn">S'inscrire</a>
                @endif
                @endauth
            </div>
        </div>
    </nav>
</header>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartBadge = document.querySelector('.cart-badge');
        
        // Fonction pour récupérer le nombre d'articles du panier
        function updateCartCount() {
            fetch("{{ route('panier.count') }}")
                .then(response => response.json())
                .then(data => {
                    cartBadge.textContent = data.count; // Met à jour le badge avec le nombre d'articles
                })
                .catch(error => console.log('Erreur:', error));
        }

        updateCartCount(); // Initialisez le compteur au chargement de la page

        // Si nécessaire, vous pouvez appeler cette fonction à chaque ajout de produit
        // ou tout autre événement qui modifie le panier.
    });
</script>

</body>
