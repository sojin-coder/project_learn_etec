<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <a href="{{ route('find') }}">Find</a>
        <a href="{{ route('create') }}">Create</a>
        <a href="{{ route('update') }}">Update</a>
        <a href="{{ route('delete') }}">Delete</a>
        <ul>
            @foreach ($products as $product )
                <li>{{ $product['id'] }}</li>
                <li>{{ $product['title'] }}</li>
                <li>{{ $product['price'] }}</li>
                <li>{{ $product['qty'] }}</li>
                <li>{{ $product['description'] }}</li>
                <hr>
            @endforeach
        </ul>
    </main>
</body>
</html>
