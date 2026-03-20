<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body class="flex items-center justify-center min-h-screen">

    @if (Route::has('login'))
        <nav class="flex gap-4">
            @auth
                <a href="{{ url('/home') }}">
                    Home
                </a>
            @else
            <H1> Welcome to the Book Searching Library</H1>
            <p> This is a simple website where you can search for books. This is a working progress please be patient</p>
                <a href="{{ route('login') }}">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif

</body>
</html>