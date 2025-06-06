@extends('layouts.layout')

@section('title', 'Meu Perfil')

@section('content')
    <h1>Meu Perfil</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')
        <div style="margin: 15px 0;">
            <label for="descricao">Descrição:</label><br>
            <textarea name="descricao" id="descricao" rows="4" cols="50">{{ $user->descricao }}</textarea>
        </div>
        <button type="submit">Salvar Descrição</button>
    </form>

    <hr>

    <h2>Minhas Receitas</h2>

    @if ($receitas->count())
        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
            @foreach ($receitas as $receita)
                <div style="border: 1px solid #ccc; padding: 10px; width: 250px;">
                    <img src="{{ asset('storage/' . $receita->imagem) }}" alt="{{ $receita->titulo }}" style="width: 100%; height: auto;">
                    <h3>{{ $receita->titulo }}</h3>
                    <p>{{ Str::limit($receita->descricao, 100) }}</p>
                    <a href="{{ route('receitas.show', $receita->id) }}">Ver Receita</a>
                </div>
            @endforeach
        </div>
    @else
        <p>Você ainda não postou nenhuma receita.</p>
    @endif
@endsection
