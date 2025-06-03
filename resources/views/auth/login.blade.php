@extends('layouts.auth')

@section('content')
<div style="max-width: 400px; margin: 60px auto; padding: 30px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); background-color: #fff;">

    <h2 style="text-align: center; margin-bottom: 25px;">Já possui cadastro?</h2>

    @if(session('status'))
        <div style="color: green; margin-bottom: 15px;">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div style="margin-bottom: 20px; display: flex; align-items: center;">
            <span style="margin-right: 10px;">
                📧
            </span>
            <input id="email" type="email" name="email" placeholder="Email" required autofocus style="flex: 1; padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 20px; display: flex; align-items: center;">
            <span style="margin-right: 10px;">
                🔒
            </span>
            <input id="password" type="password" name="password" placeholder="Senha" required style="flex: 1; padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 20px;">
            <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Entrar</button>
        </div>
    </form>

    <div style="text-align: center;">
        <a href="{{ route('password.request') }}">Esqueci a minha senha</a> |
        <a href="{{ route('register') }}">Criar nova conta</a>
    </div>
</div>
@endsection
