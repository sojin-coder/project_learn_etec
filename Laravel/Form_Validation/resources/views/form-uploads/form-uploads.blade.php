<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif
    <form action="{{ route('post.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('title')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <input type="text" name="title" placeholder="title"><br>
        @error('content')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <input type="text" name="content" placeholder="content"><br>
        @error('image')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <input type="file" name="image"><br>
        <img width="100px"><br>
        <button type="submit">Submit</button>
    </form>

    <hr>
    <main>
        <p>{{ session('data.title') }}</p>
        <p>{{ session('data.content') }}</p>
        <img src="{{ asset('storage/' . session('data.image')) }}" width="100px">
    </main>
</body>
</html>