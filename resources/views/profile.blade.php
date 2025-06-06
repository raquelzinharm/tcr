@extends('layouts.layout')

@section('title', 'Meu Perfil')

@section('content')
    <h1 style="font-size: 24px; margin-bottom: 15px;">Meu Perfil</h1>

    <p><strong>Nome:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

    <a href="{{ route('profile.edit') }}" style="
        display: inline-block;
        margin-top: 15px;
        padding: 10px 15px;
        background-color: #007BFF;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    ">Editar Perfil</a>
@endsection
