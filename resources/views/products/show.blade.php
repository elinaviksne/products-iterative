<x-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/product-quantity.js', 'resources/js/tags-autocomplete.js'])

    <div class="main-content">
        <h1>{{ $product->name }}</h1>

        <p><strong>Apraksts:</strong> {{ $product->description }}</p>
        <p><strong>Cena:</strong> €{{ $product->price }}</p>
        <p><strong>Daudzums noliktavā:</strong> <span id="product-quantity">{{ $product->quantity }}</span></p>
        <p><strong>Statuss:</strong> {{ $product->status }}</p>
        <p><strong>Derīguma termiņš:</strong> {{ $product->expiration_date }}</p>

        <div class="quantity-buttons">
            <button class="quantity-btn" data-action="increase" data-url="{{ route('products.increase', $product) }}">+ Palielināt</button>
            <button class="quantity-btn" data-action="decrease" data-url="{{ route('products.decrease', $product) }}">− Samazināt</button>
        </div>

        <hr>

        <h2>Birkas</h2>
        <div id="tags-wrapper">
            <div class="tags-container" id="tags-container">
                @foreach($product->tags as $tag)
                    <span class="tag" data-name="{{ $tag->name }}">{{ $tag->name }}
                        <button class="delete-tag">×</button>
                    </span>
                @endforeach
            </div>

            <input type="text" id="tag-input" placeholder="Raksti birkas nosaukumu..." autocomplete="off">
        </div>

        <form action="{{ route('products.update', $product) }}" method="POST" style="margin-top:20px;">
            @csrf
            @method('PUT')
            <input type="hidden" name="tags" id="tags-hidden" value="{{ $product->tags->pluck('name')->implode(',') }}">
            <button type="submit" class="btn-update">Update</button>
        </form>

        <p><a href="{{ route('products.index') }}">Atpakaļ uz produktu sarakstu</a></p>
    </div>
</x-layout>
