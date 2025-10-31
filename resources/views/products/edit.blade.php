<x-layout>
    <h1>Rediģēt produktu</h1>

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <!-- Name -->
        <p>
            <label>Nosaukums:</label><br>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
        </p>

        <!-- Description -->
        <p>
            <label>Apraksts:</label><br>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </p>

        <!-- Price -->
        <p>
            <label>Cena (€):</label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}">
        </p>

        <!-- Quantity -->
        <p>
            <label>Daudzums:</label><br>
            <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}">
        </p>

        <!-- Expiration Date -->
        <p>
            <label>Derīguma termiņš:</label><br>
            <input type="date" name="expiration_date" value="{{ old('expiration_date', $product->expiration_date) }}">
        </p>

        <!-- Status -->
        <p>
            <label>Statuss:</label><br>
            <select name="status">
                <option value="available" {{ old('status', $product->status) == 'available' ? 'selected' : '' }}>Available</option>
                <option value="unavailable" {{ old('status', $product->status) == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </p>

        <button type="submit">Atjaunināt</button>
    </form>
</x-layout>
