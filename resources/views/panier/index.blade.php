<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 30px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #ddd;
      padding: 15px 0;
    }
    .cart-item img {
      max-width: 50px;
      margin-right: 20px;
    }
    .item-details {
      flex-grow: 1;
    }
    .item-title {
      font-size: 16px;
      margin: 0 0 5px;
    }
    .item-price {
      font-size: 14px;
      color: #888;
    }
    .quantity {
      display: flex;
      align-items: center;
    }
    .quantity button {
      border: none;
      background: #ddd;
      padding: 5px 10px;
      cursor: pointer;
    }
    .quantity input {
      width: 30px;
      text-align: center;
      border: 1px solid #ddd;
      margin: 0 5px;
    }
    .total {
      text-align: right;
      font-size: 18px;
      margin-top: 20px;
    }
    .checkout-btn {
      display: block;
      text-align: center;
      margin: 20px auto;
      padding: 10px 20px;
      background: green;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }
  </style>
</head>
<body>
@include ('layouts/header')
<div class="container">

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

  <h2>Panier</h2>
  @if ($panier->isEmpty())
      <p>Votre panier est vide.</p>
  @else
      @foreach ($panier as $item)
          @if ($item->product)
          <div class="cart-item">
            <img src="{{ asset('uploads/Product/' . $item->product->image) }}" alt="{{ $item->product->nom }}">
            <div class="item-details">
              <p class="item-title">{{ $item->product->nom }}</p>
              <p class="item-price">{{ $item->product->prix }} DH</p>
            </div>
            <div class="quantity">
              <!-- Formulaire pour mettre à jour la quantité -->
              <form action="{{ route('paniers.update', $item->id) }}" method="POST" style="display: flex; align-items: center;">
                @csrf
                @method('PUT')
                <button type="submit" onclick="updateQuantity(this, -1)" class="btn btn-sm btn-light">-</button>
                <input type="number" name="quantite" value="{{ $item->quantite }}" min="1" style="width: 50px; text-align: center;">
                <button type="submit" onclick="updateQuantity(this, 1)" class="btn btn-sm btn-light">+</button>
              </form>
            </div>
            <p>{{ $item->product->prix * $item->quantite }} DH</p>
            <!-- Formulaire pour supprimer le produit -->
            <form action="{{ route('paniers.destroy', $item->id) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">&times;</button>
            </form>
          </div>
          @endif
      @endforeach

      <p class="total">Total : {{ $panier->sum(function($item) { return $item->product->prix * $item->quantite; }) }} DH</p>

      <form action="{{ route('commande.validation') }}" method="get">
        @csrf
        <button type="submit" class="checkout-btn">Passer à la commande</button>
      </form>
  @endif
</div>

<script>
  function updateQuantity(button, change) {
    let input = button.parentElement.querySelector('input[name="quantite"]');
    let currentQuantity = parseInt(input.value);
    if (!isNaN(currentQuantity)) {
        input.value = Math.max(1, currentQuantity + change);
    }
}

</script>
</body>
</html>
