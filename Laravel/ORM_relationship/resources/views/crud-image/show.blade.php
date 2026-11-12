<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Product Lists</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>price</th>
                    <th>qty</th>
                    <th>image</th>
                    <th>descripion</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
               
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>
                            <img src="{{ $product->image }}" width="100px" alt="{{ $product->name }}">
                        </td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}">
                                View
                            </a>
                            <a href="">edit</a>
                            <a href="">update</a>
                        </td>
                    </tr>
               
            </tbody>
        </table>
    </main>
</body>

</html>