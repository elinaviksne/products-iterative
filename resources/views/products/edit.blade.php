<x-layout>
    <h1>Rediģēt produktu</h1>

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <p>
            <label>Nosaukums:</label><br>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
        </p>

        <p>
            <label>Apraksts:</label><br>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </p>

        <p>
            <label>Cena (€):</label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}">
        </p>

        <button type="submit">Atjaunināt</button>
    </form>
</x-layout>
