<!DOCTYPE HTML>
<html>
	<head>
		<title>Tasty Crunch Recipes</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ url('assets/css/main.css') }}" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

        <style>
			    /* Alterações para mover o nav para cima */
            #header {
            padding-top: 0; /* Remove qualquer preenchimento superior da seção do cabeçalho */
            margin-top: 1;  /* Remove qualquer margem superior da seção do cabeçalho */
    }

            body { background-color: #f7e5e0; }
			.navbar-custom { background-color: #ffdb43; padding: 10px 30px; }
			.btn-custom { background-color:#d8b4f8;; color: #f7e5e0; border: none; border-radius: 5px; }
			.btn-custom:hover { background-color: #8fdb43; }
			.btn-buscar { background-color: #8fdb43; color: #f7e5e0 border: none; border-radius: 5px; }

            #header h1 {

            display: flex;
                align-items: center;
                font-size: 2em;
                font-family: cursive;
                margin: 0; /* Garante que não há margem superior ou inferior extra */
            }
            #header h1 img {
                width: 28px;
                height: 20px;
                margin-right: 10px;
			} .card-img-top {
                height: 200px;
                object-fit: cover;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }
            .card-title {
                font-family: 'Playfair Display', serif;
            }


		</style>
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
			<section id="header">
				<div class="navbar-custom d-flex justify-content-between align-items-center">
					<h1>
						<img src="https://upload.wikimedia.org/wikipedia/en/0/05/Flag_of_Brazil.svg" alt="BR">
						<a href="#" style="text-decoration: none; color: #000;">Tasty Crunch Recipes</a>
					</h1>
					<div class="d-flex align-items-center">
						<a href="{{ route('login') }}" class="btn btn-custom me-2">Login</a>
					</div>
				</div>

				<div class="text-center mt-3">
					<form class="d-flex justify-content-center" method="GET" action="{{ route('site.index') }}">
						<input name="q" class="form-control w-50 me-2" type="search" placeholder="Pesquisar receita" value="{{ request('q') }}">
						<button class="btn btn-buscar" type="submit">Buscar</button>
					</form>
				</div>
				<br>

				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="current"><a href="{{ url('/') }}">Principal</a></li>
						<li><a href="#">Categorias</a>
							<ul>
								@foreach ($categorias as $value)
									<li><a href="{{ url('/PostagemByCategoriaId/' . $value->id) }}">{{ $value->nome }}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="#">Autores</a>
							<ul>
								@foreach ($autores as $value)
									<li><a href="{{ url('/PostagemByAutorId/' . $value->id) }}">{{ $value->name }}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="#section2">Chefes</a></li>
						<li><a href="#section3">Receitas</a></li>
					</ul>
				</nav>
			</section>

			<div class="container">
				<div class="container py-5">
                    <h2 class="text-center mb-4">Receitas Recentes</h2>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($postagens as $postagem)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    @if($postagem->imagem)
                                        <img src="{{ asset('storage/' . $postagem->imagem) }}" class="card-img-top" alt="Imagem da receita">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $postagem->titulo }}</h5>
                                        <p class="card-text">{{ Str::limit($postagem->descricao, 100) }}</p>
                                        <a href="{{ url('/postagem/' . $postagem->id) }}" class="btn btn-custom">Ver Receita</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
			</div>

			<footer class="text-center py-4" style="background-color: #f8f9fa;">
				<p>&copy; {{ date('Y') }} Tasty Crunch Recipes. Todos os direitos reservados.</p>
			</footer>

		</div>

		<!-- Scripts -->
		<script src="{{ url('assets/js/jquery.min.js') }}"></script>
		<script src="{{ url('assets/js/jquery.dropotron.min.js') }}"></script>
		<script src="{{ url('assets/js/browser.min.js') }}"></script>
		<script src="{{ url('assets/js/breakpoints.min.js') }}"></script>
		<script src="{{ url('assets/js/util.js') }}"></script>
		<script src="{{ url('assets/js/main.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>
