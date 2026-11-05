<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Produk | Kopsis Skansaba Syariah')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">
    <header class="admin-topbar">
        <a href="{{ route('home') }}" class="admin-brand">
            <img src="{{ asset('images/kopsis.png') }}" alt="">
            <span><strong>KOPSIS</strong><small>SKANSABA SYARIAH</small></span>
        </a>
        <div class="admin-topbar-actions">
            <a href="{{ route('home') }}" class="admin-link"><i class="fa-solid fa-arrow-left"></i> Website</a>
            @if (session('admin_authenticated') === true)
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="admin-button admin-button-outline" type="submit">Logout</button>
                </form>
            @endif
        </div>
    </header>

    <main class="admin-main">
        @yield('content')
    </main>
</body>
</html>
