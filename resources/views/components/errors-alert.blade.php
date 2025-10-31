@if ($errors->any())
    <div class="flash-error">
        <strong>Kļūdas:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
