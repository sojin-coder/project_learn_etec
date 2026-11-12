<main>
    <h1>Product </h1>

    <ul>
        <li>{{ $data['title'] }}</li>
        <li>{{ $data['price'] }}</li>
        <li>{{ $data['stock'] }}</li>
        <li>{{ $data['des'] }}</li>
    </ul>

    <a href="{{ route('form.create') }}">back</a>
</main>