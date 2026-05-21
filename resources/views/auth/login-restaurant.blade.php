
@extends('layout.app')

@section('title', 'Login — Rumah Makan')

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Rumah Makan</title>
</head>
<body>
    <h1>Login Tema Rumah Makan</h1>

    @if($errors->any())
        <div style="color:red;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <input type="hidden" name="theme" value="restaurant" />
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required />
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required />
        </div>
        <button type="submit">Login</button>
    </form>

    <p>Pilih halaman login lain:</p>
    <a href="{{ route('login.hospital') }}">Rumah Sakit</a>
    <a href="{{ route('login.store') }}">Toko</a>
</body>
</html>

@section('content')
@endsection
