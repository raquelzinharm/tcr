<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Dopetrope by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ url("assets/css/main.css") }}" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">

					<!-- Logo -->
                <!-- Nav -->
                    <h1><a href="index.html">Tasty Crunch Recipes</a></h1>
                    <div style="display: flex; justify-content: flex-end; padding: 15px 30px;">

                        <a href="{{ route('login') }}">
                            <button style="padding: 8px 16px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;"
                                    onmouseover="this.style.backgroundColor='#45a049'"
                                    onmouseout="this.style.backgroundColor='#4CAF50'">
                                Login
                            </button>
                        </a>
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <form class="d-flex ms-auto me-3" method="GET" action="{{ route('site.index') }}">
                            <input name="q" class="form-control me-2" type="search" placeholder="Pesquisar receita" aria-label="Search" value="{{ request('q') }}">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                      </div>
					<!-- Nav -->
						<nav id="nav">

                            <ul>
								<li class="current"><a href="{{ url("/") }}">Principal</a></li>
								<li>
                                    <a href="#">Categorias</a>
									<ul>
                                        @foreach ($categorias as $value)
										    <li><a href="{{ url('/PostagemByCategoriaId/' . $value->id) }}">{{ $value->nome }}</a></li>
                                        @endforeach
                                    </ul>
								</li>

                                <li>
									<a href="#">Autores</a>
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
                        <!-- desce la p baixo -->

        <div class="container">
            @yield('content')
        </div>


			<!-- Footer -->
				<section id="footer">
					<div class="container">
						<div class="row">
							<div class="col-8 col-12-medium">
								<section>
									<header>
                                        <h2 id="section2">Nossos Chefes</h2>

                                           <div class="chef-profile">
                                           <h3>Chef Antônio Souza - AM</h3>
                                         <img src="{{ url('images/chefs/antonio.jpg') }}" alt="Chef Antônio Souza" style="max-width: 300px; border-radius: 10px; margin-bottom: 10px;">
                                            <p>
                                    Nascido e criado em Manaus, o Chef é dono de um Restaurante Flutuante no grande rio Amazonas: o <strong>“Peixe Vermelho”</strong>, famoso por seu preparo do tradicional peixe <strong>Pirarucu</strong>. Antônio é especialista em pratos regionais amazônicos e é reconhecido por valorizar os sabores autênticos da floresta.
                                                 </p>
                                            </div>

                                            <div class="chef-profile">
                                                <h3>Chef Amanda Goés - RS</h3>
                                              <img src="{{ url('images/chefs/antonio.jpg') }}" alt="Chef Antônio Souza" style="max-width: 300px; border-radius: 10px; margin-bottom: 10px;">
                                                 <p>
                                                    Nascida e criada em Porto Alegre, a Chef Amanda é dona do Restaurante “Pé de Fava”, e compartilha receitas e dicas de preparo da mais deliciosa comida gaúcha. Do perfeito churrasco, ao Chá Matte sem erros em minutos.
                                                      </p>
                                                 </div>


										</li>
										<li>
											<span class="date">Jan <strong>12</strong></span>
											<h3><a href="#">Dolore tempus ipsum feugiat nulla</a></h3>
											<p>Feugiat lorem dolor sed nullam tempus lorem ipsum dolor sit amet nullam consequat.</p>
										</li>
										<li>
											<span class="date">Jan <strong>10</strong></span>
											<h3><a href="#">Blandit tempus aliquam?</a></h3>
											<p>Feugiat sed tempus blandit tempus adipiscing nisl lorem ipsum dolor sit amet dolore.</p>
										</li>
									</ul>
								</section>
							</div>
							<div class="col-4 col-12-medium">
								<section>
									<header>
										<h2>What's this all about?</h2>
									</header>
									<a href="#" class="image featured"><img src="{{ url("images/pic10.jpg") }}" alt="" /></a>
									<p>
										This is <strong>Dopetrope</strong> a free, fully responsive HTML5 site template by
										<a href="http://twitter.com/ajlkn">AJ</a> for <a href="http://html5up.net/">HTML5 UP</a> It's released for free under
										the <a href="http://html5up.net/license/">Creative Commons Attribution</a> license so feel free to use it for any personal or commercial project &ndash; just don't forget to credit us!
									</p>
									<footer>
										<ul class="actions">
											<li><a href="#" class="button">Find out more</a></li>
										</ul>
									</footer>
								</section>
							</div>
							<div class="col-4 col-6-medium col-12-small">
								<section>
									<header>
										<h2>Tempus consequat</h2>
									</header>
									<ul class="divided">
										<li><a href="#">Lorem ipsum dolor sit amet sit veroeros</a></li>
										<li><a href="#">Sed et blandit consequat sed tlorem blandit</a></li>
										<li><a href="#">Adipiscing feugiat phasellus sed tempus</a></li>
										<li><a href="#">Hendrerit tortor vitae mattis tempor sapien</a></li>
										<li><a href="#">Sem feugiat sapien id suscipit magna felis nec</a></li>
										<li><a href="#">Elit class aptent taciti sociosqu ad litora</a></li>
									</ul>
								</section>
							</div>
							<div class="col-4 col-6-medium col-12-small">
								<section>
									<header>
										<h2>Ipsum et phasellus</h2>
									</header>
									<ul class="divided">
										<li><a href="#">Lorem ipsum dolor sit amet sit veroeros</a></li>
										<li><a href="#">Sed et blandit consequat sed tlorem blandit</a></li>
										<li><a href="#">Adipiscing feugiat phasellus sed tempus</a></li>
										<li><a href="#">Hendrerit tortor vitae mattis tempor sapien</a></li>
										<li><a href="#">Sem feugiat sapien id suscipit magna felis nec</a></li>
										<li><a href="#">Elit class aptent taciti sociosqu ad litora</a></li>
									</ul>
								</section>
							</div>

							<div class="col-12">

								<!-- Copyright -->
									<div id="copyright">

                                            <section>
                                                <header>
                                                    <h2>Vitae tempor lorem</h2>
                                                </header>
                                                <ul class="social">
                                                    <li><a class="icon brands fa-github" href="#" target="_blank"><span class="label">GitHub</span></a></li>
                                                    <li><a class="icon brands fa-linkedin-in" href="#"><span class="label">LinkedIn</span></a></li>
                                                </ul>

                                            </section>

                                        <ul class="links">
											<li>&copy;Feito por Tauã, Carol & Raquel.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>

							</div>
						</div>
					</div>
				</section>

		</div>

		<!-- Scripts -->
			<script src="{{ url("assets/js/jquery.min.js") }}"></script>
			<script src="{{ url("assets/js/jquery.dropotron.min.js") }}"></script>
			<script src="{{ url("assets/js/browser.min.js") }}"></script>
			<script src="{{ url("assets/js/breakpoints.min.js") }}"></script>
			<script src="{{ url("assets/js/util.js") }}"></script>
			<script src="{{ url("assets/js/main.js") }}"></script>

	</body>
</html>