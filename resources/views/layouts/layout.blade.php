<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'TASTY CRUNCHY RECIPES')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body { margin: 0; font-family: Arial, sans-serif; background-color: #f5f5f5; }
        nav { background-color: #fff; border-bottom: 1px solid #ddd; padding: 10px 20px; display: flex; align-items: center; justify-content: space-between; }
        .nav-links, .mobile-menu { display: flex; gap: 15px; align-items: center; }
        .search-bar input { padding: 5px; border-radius: 4px; border: 1px solid #ccc; }
        .user-menu { position: relative; }
        .user-dropdown { display: none; position: absolute; top: 35px; right: 0; background: #fff; border: 1px solid #ccc; border-radius: 4px; min-width: 150px; z-index: 100; }
        .user-dropdown a, .user-dropdown form button { display: block; padding: 10px; text-align: left; text-decoration: none; color: #333; background-color: #fff; border: none; width: 100%; }
        .user-dropdown a:hover, .user-dropdown form button:hover { background-color: #f0f0f0; }
        .hamburger { display: none; cursor: pointer; font-size: 20px; }
        .mobile-menu { display: none; flex-direction: column; gap: 10px; margin-top: 10px; }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hamburger { display: block; }
            .mobile-menu { display: flex; }
        }

        .container { max-width: 800px; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <a href="{{ route('home') }}" style="font-weight: bold; font-size: 20px;">TASTY CRUNCHY RECIPES</a>

        <div class="nav-links">
            <a href="{{-- route('home') --}}">Home</a>
            <a href="{{-- route('receitas.index') --}}">Receitas</a>
            <a href="{{-- route('chefs.index') --}}">Chef</a>

            <form action="{{ route('pesquisar') }}" method="GET" class="search-bar">
                <input type="text" name="q" placeholder="Buscar...">
            </form>

            <div class="user-menu">
                <button id="userIcon" style="background: none; border: none; cursor: pointer;">👤</button>
                <div class="user-dropdown" id="userDropdown">
                    <a href="{{ route('profile') }}">Ver Perfil</a>
                    <a href="{{ route('profile.edit') }}">Configurações</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Sair</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="hamburger" id="hamburger">☰</div>
    </nav>

    <!-- Menu mobile -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('receitas.index') }}">Receitas</a>
        <a href="{{ route('chefs.index') }}">Chef</a>
        <form action="{{ route('pesquisar') }}" method="GET" class="search-bar">
            <input type="text" name="q" placeholder="Buscar...">
        </form>
        <a href="{{ route('profile') }}">Ver Perfil</a>
        <a href="{{ route('profile.edit') }}">Configurações</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </div>

    <!-- Conteúdo -->
    <main class="container">
        @yield('content')
    </main>

    <script>
        // Toggle menu mobile
        document.getElementById('hamburger').addEventListener('click', function () {
            const menu = document.getElementById('mobileMenu');
            menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
        });

        // Toggle dropdown usuário
        document.getElementById('userIcon').addEventListener('click', function () {
            const dropdown = document.getElementById('userDropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });

        // Fecha dropdown ao clicar fora
        document.addEventListener('click', function (e) {
            const dropdown = document.getElementById('userDropdown');
            const button = document.getElementById('userIcon');
            if (!dropdown.contains(e.target) && !button.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>

</body>
</html>
