@extends('layouts.app')

@section('content')
<h2>Forgot Password</h2>

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required autofocus>

    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Send Password Reset Link</button>
</form>
@endsection
@extends('layouts.app')

@section('content')
<h2>Forgot Your Password?</h2>

@if(session('status'))
    <div style="color: green;">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label for="email">Email Address</label><br>
    <input type="email" id="email" name="email" required autofocus><br><br>

    @error('email')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <button type="submit">Send Password Reset Link</button>
</form>
@endsection
