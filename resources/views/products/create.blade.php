<x-layout>
    <h1>Jauns produkts</h1>


    <x-errors-alert />
    
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

        <p>
            <label>Daudzums:</label><br>
            <input type="number" name="quantity" value="{{ old('quantity') }}">
        </p>

        <p>
            <label>Derīguma termiņš:</label><br>
            <input type="date" name="expiration_date" value="{{ old('expiration_date') }}">
        </p>

        <p>
            <label>Statuss:</label><br>
            <select name="status">
                <option value="available" {{ old('status')=='available' ? 'selected' : '' }}>Available</option>
                <option value="unavailable" {{ old('status')=='unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </p>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
