<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Commandes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fdf7ec;
      font-family: Arial, sans-serif;
    }
    .order-container {
      max-width: 900px;
      margin: 50px auto;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .order-header {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .order-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 20px;
      padding: 15px;
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
    .order-footer {
      text-align: right;
      font-weight: bold;
      margin-top: 10px;
    }
  </style>
</head>
<body>



  @include('layouts.header')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
  <div class="container mt-5">
    <div class="order-container">
      <h1 class="order-header">Mes Commandes</h1>

      @if ($commandes->isEmpty())
        <p class="text-center">Vous n'avez pas encore passé de commandes.</p>
      @else
        @foreach ($commandes as $commande)
        <div class="order-card">
          <h5>Commande #{{ $commande->id }}</h5>
          <p>Date : {{ $commande->created_at->format('d/m/Y') }}</p>

          <div class="order-items">
            @foreach ($commande->details as $detail)
              <div class="order-item">
                <div>
                  <img src="{{ asset('uploads/Product/' . $detail->product->image) }}" alt="{{ $detail->product->name }}">
                  <span>{{ $detail->product->nom }}</span>
                </div>
                <span>{{ $detail->quantite }} x {{ $detail->prix }} DH</span>
              </div>
            @endforeach
          </div>

          <div class="order-footer">
            Total : {{ $commande->total }} DH
          </div>
        </div>
        @endforeach
      @endif
    </div>
  </div>
<footer>
  @include('layouts.footer')</footer>
</body>
</html>
