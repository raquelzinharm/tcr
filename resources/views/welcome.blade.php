@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Barra de menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <a class="navbar-brand" href="{{ route('site.index') }}">Home</a>
            <a class="navbar-brand" href="{{ url('/chefes') }}">Chefes</a>

                @isset($autor)
                    {{ $autor->name }}
                    <img src ="data:image/png;base64, {{ $autor->foto }}" alt="Imagem de perfil" />
                @endisset

                @foreach ($postagens as $value )
                    <article class="box post">
                    <header>
                            <h2>{{ $value->titulo }}</h2>
                        <p>Categoria: {{$value->categoria->nome}} </p>
                        </header>
                        <p>{!! $value->descricao!!}</p>
                        <p>Autor: {{$value->autor->name}} </p>
                @endforeach

            <form class="form-inline ml-auto" method="GET" action="{{ route('site.index') }}">
                <input name="q" class="form-control mr-sm-2" type="search" placeholder="Pesquisar receita" aria-label="Search" value="{{ request('q') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </nav>

    </div>

@endsection


