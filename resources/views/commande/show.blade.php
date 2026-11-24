@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h1>Détails de la commande</h1>

    <div class="card">
        <div class="card-header">
            Commande #{{ $commande->id }}
        </div>
        <div class="card-body">
            <p><strong>Date de commande :</strong> {{ $commande->created_at }}</p>
            <p><strong>Adresse :</strong> {{ $commande->adresse }}, {{ $commande->ville }}</p>
            <p><strong>Total :</strong> {{ $commande->total }} DH</p>

            <h4>Produits :</h4>
            <ul>
                @foreach ($commande->details as $detail)
                <li>
                    {{ $detail->product->nom }} - {{ $detail->quantite }} x {{ $detail->prix }} DH
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
