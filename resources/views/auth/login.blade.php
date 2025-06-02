@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 400px; margin: 50px auto;">
    <h2>Login</h2>

    @if(session('status'))
        <div style="color: green;">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="email">Email</label><br>
            <input id="email" type="email" name="email" required autofocus style="width: 100%;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password">Password</label><br>
            <input id="password" type="password" name="password" required style="width: 100%;">
        </div>

        <div style="margin-bottom: 15px;">
            <button type="submit">Login</button>
        </div>
    </form>

    <div>
        <a href="{{ route('password.request') }}">I forgot my password</a>
    </div>
</div>
@endsection
