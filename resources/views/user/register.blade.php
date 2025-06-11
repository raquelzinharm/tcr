@extends('layouts.auth')

@section('content')
<div class="container" style="max-width: 500px; margin: 50px auto;">
    <h2>Registrar Nova Conta</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name">Nome</label><br>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus style="width: 100%;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email">Email</label><br>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required style="width: 100%;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password">Senha</label><br>
            <input id="password" type="password" name="password" required style="width: 100%;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation">Confirmar Senha</label><br>
            <input id="password_confirmation" type="password" name="password_confirmation" required style="width: 100%;">
        </div>

        <div style="margin-bottom: 15px;">
            <button type="submit">Criar Conta</button>
        </div>

        <div>
            <a href="{{ route('login') }}">Já tem conta? Faça login</a>
        </div>
    </form>
</div>
@endsection
