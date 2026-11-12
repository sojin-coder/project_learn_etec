<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </header>
    <div>
        {{ $slide ?? '' }}
    </div>
    <main>{{ $slot }}</main>
    <footer>
        <p>&copy: {{ date('Y') }} My Website. All rights reserved.</p>
    </footer>
</body>
</html>