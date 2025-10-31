<x-layout>
    <h1>{{ $product->name }}</h1>

    <p><strong>Apraksts:</strong> {{ $product->description }}</p>
    <p><strong>Cena:</strong> {{ $product->price }} €</p>

    <a href="{{ route('products.index') }}">← Atpakaļ uz sarakstu</a>
</x-layout>
