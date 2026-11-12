<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('form.store') }}" method="POST">
        @csrf
        <h1>Form Validation</h1>
        @error('title')
            <span style="color: red;">{{ $message }}</span> <br>
        @enderror
        <input type="text" name="title" placeholder="title"><br>
        @error('price')
            <span style="color: red;">{{ $message }}</span> <br>
        @enderror
        <input type="number" name="price" placeholder="price"><br>
        @error('stock')
            <span style="color: red;">{{ $message }}</span> <br>
        @enderror
        <input type="number" name="stock" placeholder="stock"><br>
        <textarea name="des"></textarea><br>

        <button type="submit">submit</button>
        <button type="reset">cancel</button>
    </form>
</body>

</html>