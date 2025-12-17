<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset("css/Blog/mdb.min.css") }}" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset("css/Blog/style.css") }}" />
</head>
<body>
    <header>
        <style>
            #intro {
                margin-top: 58px;
            }
            @media (max-width: 991px) {
                #intro {
                margin-top: 45px;
                }
            }
        </style>

        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            @include('Blog.components.nav')
        </nav>

        <div id="intro" class="p-5 text-center bg-light">
            @yield('header-intro')
        </div>
    </header>

    <main class="container my-5">
        @yield('main')
    </main>

    <footer class="bg-light text-lg-start">
        @include('Blog.components.footer')
    </footer>

    @yield('script')
    <script type="text/javascript" src="{{ asset("js/Blog/mdb.min.js") }} "></script>
    <script type="text/javascript" src="{{ asset("js/Blog/script.js") }} "></script>
</body>
</html>
