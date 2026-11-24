<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validation de la commande</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fdf7ec;
      font-family: 'Arial', sans-serif;
    }
    .checkout-container {
      max-width: 800px;
      margin: 50px auto;
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .checkout-header {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .form-label {
      font-weight: bold;
    }
    .order-summary {
      background-color: #f9f9f9;
      border-radius: 8px;
      padding: 20px;
    }
    .order-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }
    .order-item img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 5px;
    }
    .purchase-btn {
      background-color: #ea9c65;
      color: white;
      font-weight: bold;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      text-transform: uppercase;
    }
    .purchase-btn:hover {
      background-color: #d68c5c;
    }
    .footer {
      margin-top: 30px;
      text-align: center;
      font-size: 14px;
      color: #888;
    }
  </style>
</head>
<body>
    @include ('layouts.header')
    <div class="container mt-5">
    <h2>Validation de la commande</h2>
    <form action="{{ route('commande.store') }}" method="POST">
    @csrf

    <!-- Informations personnelles -->
    <h4>Informations personnelles</h4>
    <div class="mb-3">
        <label for="firstName" class="form-label">Nom complet</label>
        <input type="text" class="form-control" id="firstName" name="nom_complet" placeholder="Nom et prénom" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Adresse e-mail" required>
    </div>
    <div class="mb-3">
        <label for="number" class="form-label">Téléphone</label>
        <input type="number" class="form-control" id="number" name="telephone" placeholder="Numéro de téléphone" required>
    </div>

    <!-- Informations de livraison -->
    <h4>Informations de livraison</h4>
    <div class="mb-3">
        <label for="addresse" class="form-label">Adresse</label>
        <input type="text" class="form-control" id="addresse" name="adresse" placeholder="Rue, bâtiment, etc." required>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="city" class="form-label">Ville</label>
            <input type="text" class="form-control" id="city" name="ville" placeholder="Ville" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="postalCode" class="form-label">Code postal</label>
            <input type="text" class="form-control" id="postalCode" name="code_postal" placeholder="Code postal" required>
        </div>
    </div>

    <!-- Options de livraison -->
    <h4>Options de livraison</h4>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="mode_livraison" id="standardShipping" value="standard" checked>
        <label class="form-check-label" for="standardShipping">
            Livraison standard (Gratuite)
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="mode_livraison" id="expressShipping" value="express">
        <label class="form-check-label" for="expressShipping">
            Livraison express (20 DH)
        </label>
    </div>
    <!-- Paiement -->
    <h4>Paiement</h4>
    <div class="mb-3">
      <label for="cardNumber" class="form-label">Numéro de carte bancaire</label>
      <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9101 1121" required>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="expirationDate" class="form-label">Date d'expiration (MM/AA)</label>
        <input type="DATE" class="form-control" id="expirationDate" placeholder="MM/AA" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="nom" class="form-label">nom d'utilisateur de carte </label>
        <input type="text" class="form-control" id="nom" placeholder="nom" required>
      </div>
    </div>
    <!-- Récapitulatif de la commande -->
    <h4>Votre commande</h4>
    <div class="order-summary">
        @foreach ($panier as $item)
            @if ($item->product)
                <div class="order-item">
                    <div>
                        <img src="{{ asset('uploads/Product/' . $item->product->image) }}" alt="{{ $item->product->nom }}">
                        <span>{{ $item->product->nom }}</span>
                    </div>
                    <span>{{ $item->product->prix }} DH</span>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Bouton de validation -->
    <div class="text-center mt-4">
        <button type="submit" class="purchase-btn">Confirmer la commande </button>
    </div>
</form>

    <!-- Footer -->
    @include('layouts.footer')
  </div>
</body>
</html>
