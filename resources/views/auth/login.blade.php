@extends('layouts.auth')

@section('content')
<div class="login-container">

    <h2>Já possui cadastro?</h2>

    @if(session('status'))
        <div class="alert-message alert-success">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-message alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Senha:</label>
            <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
        </div>

        <div class="form-group">
            <button type="submit" class="form-button">Entrar</button>
        </div>
    </form>

    <div class="links-container">
        <a href="{{ route('password.request') }}">Esqueci a minha senha</a> |
        <a href="{{ route('register') }}">Criar nova conta</a>
    </div>
</div>
@endsection