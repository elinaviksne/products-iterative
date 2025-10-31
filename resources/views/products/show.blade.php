<x-layout>
    <h1>{{ $product->name }}</h1>

    <p><strong>Apraksts:</strong> {{ $product->description }}</p>
    <p><strong>Cena:</strong> €{{ $product->price }}</p>
    <p><strong>Daudzums noliktavā:</strong> <span id="product-quantity">{{ $product->quantity }}</span></p>
    <p><strong>Statuss:</strong> {{ $product->status }}</p>
    <p><strong>Derīguma termiņš:</strong> {{ $product->expiration_date }}</p>

    <button class="quantity-btn" data-action="increase" data-url="{{ route('products.increase', $product) }}">+ Palielināt</button>
    <button class="quantity-btn" data-action="decrease" data-url="{{ route('products.decrease', $product) }}">− Samazināt</button>

    <p><a href="{{ route('products.index') }}">Atpakaļ uz produktu sarakstu</a></p>

    <!-- Nodrošinām CSRF token JS pieprasījumiem -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/js/product-quantity.js'])
</x-layout>
