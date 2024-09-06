<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Mi Página de Productos</h1>
    </header>
    <style>
        .vertical{
        -webkit-writing-mode: vertical-rl;
        -moz-writing-mode: vertical-rl;
        -ms-writing-mode: vertical-rl;
        writing-mode: vertical-rl;
        }
 </style>
 <p class=vertical lang=ja>これはテストテキスト。<br/>
日本語は楽しいです。</p>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; 2024 Mi Tienda</p>
    </footer>
</body>
</html>
