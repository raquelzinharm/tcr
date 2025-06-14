@extends('layouts.app')

@section('content')
    <div class="container">

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
        </nav>

    </div>
@endsection


