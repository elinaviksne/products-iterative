<x-layout>
    <h1>Produkti</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('products.create') }}">+ Jauns produkts</a>

    <table cellpadding="5" cellspacing="0" style="margin-top: 10px;">
        <tr>
            <th>ID</th>
            <th>Nosaukums</th>
            <th>Cena (€)</th>
            <th>Darbības</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
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
