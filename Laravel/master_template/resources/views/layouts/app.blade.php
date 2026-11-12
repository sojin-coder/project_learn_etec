<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTFUTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
</head>

<body>
    @include('common.header')

    <main>
        @yield('content') <!-- block content -->
    </main>

    @include('common.footer')
</body>

</html>