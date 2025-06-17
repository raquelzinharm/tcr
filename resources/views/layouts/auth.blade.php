<!DOCTYPE HTML>
<html>
    <head>
        <title>Login - Tasty Crunch Recipes</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="{{ url('assets/css/main.css') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

        <style>
            /* As mesmas cores de fundo da página principal */
            body { background-color: #f7e5e0; }
            .navbar-custom { background-color: #f7e5e0; padding: 10px 30px; }

            /* Estilos dos botões da página principal */
            .btn-custom {
                background-color:#d8b4f8; /* Cor normal */
                border-radius: 5px;
                color: #fff; /* Adicionei cor do texto para o botão de login */
                border: none;
            }
            .btn-custom:hover {
                background-color: #d8b4f8; /* MESMA cor para hover */
            }

            .btn-buscar { /* Este botão não aparecerá na página de login, mas mantemos o estilo por consistência */
                background-color: #8fdb43; /* Cor normal */
                border-radius: 5px;
                color: white;
                border: none;
            }
            .btn-buscar:hover {
                background-color: #8fdb43; /* MESMA cor para hover */
            }

            /* Ajustes para o cabeçalho, como na página principal */
            #header {
                padding-top: 0;
                margin-top: 0;
            }
            #header h1 {
                display: flex;
                align-items: center;
                font-size: 2em;
                font-family: cursive;
                margin: 0;
            }
            #header h1 img {
                width: 28px;
                height: 20px;
                margin-right: 10px;
            }

            /* Estilo para centralizar o conteúdo do login e dar uma aparência de "card" */
            .login-container {
                max-width: 450px; /* Aumentei um pouco para melhor visual */
                margin: 50px auto; /* Espaçamento para o topo e centralizar */
                padding: 35px; /* Mais padding */
                border: 1px solid #e0e0e0; /* Borda mais suave */
                border-radius: 12px; /* Cantos mais arredondados */
                box-shadow: 0 4px 15px rgba(0,0,0,0.08); /* Sombra mais destacada */
                background-color: #ffffff; /* Fundo branco para o card */
                font-family: Arial, sans-serif; /* Fonte mais padrão para o formulário */
            }
            .login-container h2 {
                text-align: center;
                margin-bottom: 30px; /* Mais espaço após o título */
                color: #333;
                font-family: 'Playfair Display', serif; /* Mantendo a fonte de título */
            }
            .form-group {
                margin-bottom: 25px; /* Espaço entre os campos */
            }
            .form-group input[type="email"],
            .form-group input[type="password"] {
                width: 100%;
                padding: 12px 15px; /* Mais padding nos inputs */
                border: 1px solid #ccc;
                border-radius: 8px; /* Inputs mais arredondados */
                font-size: 1em;
                box-sizing: border-box; /* Garante que padding não aumente a largura total */
            }
            .form-group label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
                color: #555;
            }
            .form-button {
                width: 100%;
                padding: 12px;
                background-color: #b592d4; /* Cor verde do botão de busca */
                color: white;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-size: 1.1em;
                transition: background-color 0.3s ease; /* Transição suave na cor */
            }
            .form-button:hover {
                background-color: #d8b4f8 /* Um tom um pouco diferente para hover, se quiser */
            }
            .links-container {
                text-align: center;
                margin-top: 25px;
            }
            .links-container a {
                color: #8fdb43; /* Cor roxa dos botões */
                text-decoration: none;
                margin: 0 10px;
                transition: color 0.3s ease;
            }
            .links-container a:hover {
                color: #b592d4; /* Um tom mais escuro no hover */
            }
            .alert-message {
                padding: 10px;
                margin-bottom: 15px;
                border-radius: 5px;
                font-size: 0.95em;
            }
            .alert-success {
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }
            .alert-error {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
            }

        </style>
    </head>
    <body class="homepage is-preload">
        <div id="page-wrapper">

            <section id="header">
                <div class="navbar-custom d-flex justify-content-between align-items-center">
                    <h1>
                        <img src="https://upload.wikimedia.org/wikipedia/en/0/05/Flag_of_Brazil.svg" alt="BR">
                        <a href="{{ url('/') }}" style="text-decoration: none; color: #000;">Tasty Crunch Recipes</a>
                    </h1>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('login') }}" class="btn btn-custom me-2">Login</a>
                    </div>
                </div>

                </section>

            <main>
                @yield('content')
            </main>

            <footer class="text-center py-4" style="background-color: #f8f9fa;">
                <p>Tasty Crunch Recipes. &copy; {{ date('Y') }}</p>
            </footer>

        </div>

        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.dropotron.min.js') }}"></script>
        <script src="{{ url('assets/js/browser.min.js') }}"></script>
        <script src="{{ url('assets/js/breakpoints.min.js') }}"></script>
        <script src="{{ url('assets/js/util.js') }}"></script>
        <script src="{{ url('assets/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>