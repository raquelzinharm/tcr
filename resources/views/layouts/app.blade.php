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
                <h1><a href="index.html">Home</a></h1>

            <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li class="current"><a href="{{ url("/") }}">Receitas</a></li>
                        <li>
                            <a href="#">Categorias</a>
                            <ul>
                                @isset($categorias)
            @foreach ($categorias as $value)
                <li><a href="{{ url('/PostagemByCategoriaId/' . $value->id) }}">{{ $value->nome }}</a></li>
            @endforeach
        @endisset

            </ul>
        </li>
        <li>
            @isset($autores)
            @foreach ($autores as $value)
                <li><a href="{{ url('/PostagemByAutorId/' . $value->id) }}">{{ $value->name }}</a></li>
            @endforeach
        @endisset


            </ul>
        </li>
        <li><a href="left-sidebar.html">Left Sidebar</a></li>
        <li><a href="right-sidebar.html">Right Sidebar</a></li>
        <li><a href="no-sidebar.html">No Sidebar</a></li>
    </ul>
</nav>

<div class="container">
    @yield('content')
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