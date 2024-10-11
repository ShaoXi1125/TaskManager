<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Use npm Install to install Bootstrap and Font Awesome-->
    {{-- <link rel="stylesheet" href="{{ asset("css/app.css") }}"> --}}

    <!--Use CDN to link Bootstrap and Font Awesome-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
   <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield("title") | Task Manager</title>
</head>
<body>
    <header>
        @include("layouts.header")
    </header>

    <main>
        @yield("content")
    </main>

    <footer class="bg-dark text-center text-white p-3 fixed-bottom">
        @include("layouts.footer")
    </footer>

    <script src="{{ asset("js/app.js") }}"></script>
</body>
</html>