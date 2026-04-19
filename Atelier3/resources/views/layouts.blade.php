<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('Joueurs') }}">About</a></li>
                <li><a href="{{ route('Equipes') }}">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content') 
    </main>
   <footer>
        <p>&copy; 2024 My Website. All rights reserved.</p>
   </footer>
</body>
</html>