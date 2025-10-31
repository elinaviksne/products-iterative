<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Produkti' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="layout-container">

        <header class="header">
            <h1>Testa Logo</h1>
        </header>

        <aside class="sidebar-left">
            <nav>
                <ul>
                    <li><a href="{{ route('products.index') }}">Produkti</a></li>
                    <!-- Pievieno citus linkus pēc vajadzības -->
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            {{ $slot }}
        </main>

        <aside class="sidebar-right">
            Testa reklāmas teksts
        </aside>

        <footer class="footer">
            &copy; 2025 Testa autortiesības
        </footer>

    </div>

</body>
</html>
