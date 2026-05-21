@extends('layout.app')

@section('title', 'Login — Toko Sejahtera')
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Toko</title>
</head>
<body>
    <h1>Login Tema Toko</h1>

    @if($errors->any())
        <div style="color:red;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <input type="hidden" name="theme" value="store" />
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
    <a href="{{ route('login.restaurant') }}">Rumah Makan</a>
</body>
</html>

@endsection
