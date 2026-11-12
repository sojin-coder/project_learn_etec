<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
                <ul>
                    @foreach ($user->posts as $post)
                        <li>{{ $post->title }}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    </main>
</body>
</html>