<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mans veikals' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="layout-container">
        <header class="header">
            <h1>Mans Veikals</h1>
        </header>

        <aside class="sidebar-left">
            <nav>
                <a href="{{ route('products.index') }}">Produkti</a>
                <a href="#">Cits link</a>
            </nav>
        </aside>

        <main class="main-content">
            {{ $slot }}
        </main>

        <aside class="sidebar-right">
            <p>Reklāmas vai papildu info</p>
        </aside>

        <footer class="footer">
            &copy; 2025 Mans Veikals
        </footer>
    </div>
</body>
</html>
