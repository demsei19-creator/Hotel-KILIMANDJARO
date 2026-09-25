<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hôtel Kilimandjaro | Évasion & Luxe')</title>
    <meta name="description" content="@yield('meta_description', 'Découvrez l\'Hôtel Kilimandjaro, votre prochaine destination de rêve alliant confort, luxe et nature.')">
    
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="navbar">
        <div class="navbar-container">
            <a href="{{ url('/') }}" class="logo">
                <span class="logo-icon">🏔️</span>
                Kilimandjaro
            </a>
            <nav class="nav-links">
                <a href="{{ url('/') }}">Accueil</a>
                <a href="{{ url('/chambres') }}">Chambres</a>
                <a href="{{ url('/restaurant') }}">Restaurant</a>
            </nav>
            <a href="{{ url('/chambres') }}" class="btn-primary">Réserver</a>
        </div>
    </header>

    <main class="main-content">
        {{ $slot }}
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <h3>Hôtel Kilimandjaro</h3>
                <p>Votre oasis de tranquillité et de luxe en pleine nature.</p>
            </div>
            <div class="footer-links">
                <a href="#">Conditions générales</a>
                <a href="#">Politique de confidentialité</a>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; {{ date('Y') }} Hôtel Kilimandjaro. Tous droits réservés.
        </div>
    </footer>
</body>
</html>
