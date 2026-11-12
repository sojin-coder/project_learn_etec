<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to products</h1>
    <ul>
        <li>{{ $product['id'] }}</li>
        <li>{{ $product['name'] }}</li>
        <li>{{ $product['price'] }}</li>
        <li>{{ $product['qty'] }}</li>
        <li><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" width = '160px'></li>
        <li>{{ $product['description'] }}</li>
    </ul>
</body>
</html>