<x-layout>
    <div class="main-content">
        <h1>Produkti</h1>
        <br>

        <x-success-alert />
        <x-errors-alert />

        <div class="top-actions">
            <a href="{{ route('products.create') }}" class="btn-add">+ Jauns produkts</a>
        </div>

        <table class="products-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nosaukums</th>
                    <th>Cena (€)</th>
                    <th>Daudzums</th>
                    <th>Derīguma termiņš</th>
                    <th>Statuss</th>
                    <th>Darbības</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->expiration_date }}</td>
                    <td>{{ ucfirst($product->status) }}</td>
                    <td class="actions">
                        <a href="{{ route('products.show', $product) }}" class="btn-view">Skatīt</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn-edit">Rediģēt</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Vai tiešām dzēst?')">Dzēst</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
