<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
    
<body>
<x-app-layout>
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-800 text-white flex flex-col">
        <div class="p-4 text-center font-bold text-xl border-b border-blue-700">
           MonAt
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-orange-600 ">Dashboard</a>
            <a href="{{ route('produits.index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Produits</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Ateliers</a>
            <a href="{{ route('commandes.index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Commandes</a>
            <a href="{{ route('contact.messages') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Contacts</a>
            <a href="{{ route ('welcome')}}" class="block py-2 px-4 rounded hover:bg-blue-700">Retour a page d'acceuil</a>

        </nav>
    </aside>

    
        <!-- Page Content -->
        <main class="p-6 flex-1"><div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold mb-4">Bienvenue, {{ Auth::user()->name }}!</h2>
                <p class="text-gray-600">Vous etes connecté!</p>
            </div>
        @yield('content')
        </main>
    </div>
</div>
</body>
</html>
</x-app-layout>
