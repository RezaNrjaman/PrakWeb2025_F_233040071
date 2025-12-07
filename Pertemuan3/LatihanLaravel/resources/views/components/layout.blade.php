<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  Tambahkan slot baru dengan nama $title --}}
    <title>{{  $title }}</title>

    @vite('resources/css/app.css')
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/blog">Blog</a>
        <a href="/posts">Posts</a>
        <a href="/categories">Categories</a>
        <a href="/contact">Contact</a>
    </nav>

    {{ $slot }}

    <footer>
        <hr>
        <center>
            <p>
                <b>Reza</b> &copy; {{ date('Y') }}
            </p>
        </center>
    </footer>
</body>
</html>