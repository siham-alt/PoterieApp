
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    
@include('layouts/header') 
    <!-- Corps principal -->
    <main>
        @yield('content') 
    </main>
    @include('layouts.footer') 
</body>
</html>
