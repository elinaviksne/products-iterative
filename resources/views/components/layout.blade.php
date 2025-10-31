<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Produkti' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <nav style="background: #eee; padding: 10px;">
        <a href="{{ route('products.index') }}">Produkti</a>
    </nav>

    <main style="margin: 20px;">
        {{ $slot }}
    </main>

</body>
</html>
