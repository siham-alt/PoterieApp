extends('dashboard')
@section('content')
<div class="main-content">
<div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold mb-4">Bienvenue, {{ Auth::user()->name }}!</h2>
                <p class="text-gray-600">Vous etes connecté!</p>
            </div>
            </div
            @endesection