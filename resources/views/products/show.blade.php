<x-layout>
    <h1>{{ $product->name }}</h1>

    <p><strong>Apraksts:</strong> {{ $product->description }}</p>
    <p><strong>Cena:</strong> €{{ $product->price }}</p>
    <p><strong>Daudzums noliktavā:</strong> {{ $product->quantity }}</p>
    <p><strong>Statuss:</strong> {{ $product->status }}</p>
    <p><strong>Derīguma termiņš:</strong> {{ $product->expiration_date }}</p>

    <form action="{{ route('products.increase', $product) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">+ Palielināt</button>
    </form>

    <form action="{{ route('products.decrease', $product) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">− Samazināt</button>
    </form>

    <p><a href="{{ route('products.index') }}">Atpakaļ uz produktu sarakstu</a></p>
</x-layout>
