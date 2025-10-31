<x-layout>
    <h1>Jauns produkts</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <p>
            <label>Nosaukums:</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
        </p>

        <p>
            <label>Apraksts:</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </p>

        <p>
            <label>Cena (€):</label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}">
        </p>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
