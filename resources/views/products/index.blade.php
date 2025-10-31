<x-layout>
    <h1>Produkti</h1>
    <a href="{{ route('products.create') }}">+ Jauns produkts</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table cellpadding="5">
        <tr>
            <th>Nosaukums</th>
            <th>Apraksts</th>
            <th>Cena</th>
            <th>Darbības</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }} €</td>
            <td>
                <a href="{{ route('products.show', $product) }}">Skatīt</a> |
                <a href="{{ route('products.edit', $product) }}">Rediģēt</a> |
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Vai tiešām dzēst?')">Dzēst</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-layout>
