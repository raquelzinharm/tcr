@extends('layouts.auth')

@section('content')
<div style="max-width: 400px; margin: 60px auto; padding: 30px; border: 1px solid #ccc; border-radius: 10px; background: #fff;">
    <h2 style="text-align: center; margin-bottom: 10px;">Esqueceu sua senha?</h2>
    <p style="text-align: center; color: #555; margin-bottom: 25px;">
        Informe seu e-mail cadastrado para receber um link de redefinição.
    </p>

    @if (session('status'))
        <div style="color: green; margin-bottom: 15px; text-align: center;">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div style="margin-bottom: 20px;">
            <input type="email" name="email" placeholder="Seu e-mail" value="{{ old('email') }}" required autofocus
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 20px;">
            <button type="submit"
                style="width: 100%; padding: 10px; background-color: #3490dc; color: white; border: none; border-radius: 5px;">
                Enviar link de redefinição
            </button>
        </div>
    </form>

    <div style="text-align: center;">
        <a href="{{ route('login') }}">Voltar para o login</a>
    </div>
</div>
@endsection
