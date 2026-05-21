<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard Rumah Makan</title>
</head>
<body>
    <h1>Dashboard Rumah Makan</h1>

    <p>Selamat datang, {{ auth()->user()->name }}.</p>
    <p>Ini adalah tampilan tema rumah makan untuk aplikasi Anda.</p>

    <form method="POST" action="{{ route('dashboard.theme') }}">
        @csrf
        <label>Ganti Tema</label>
        <select name="theme">
            <option value="hospital" {{ $theme === 'hospital' ? 'selected' : '' }}>Rumah Sakit</option>
            <option value="restaurant" {{ $theme === 'restaurant' ? 'selected' : '' }}>Rumah Makan</option>
            <option value="store" {{ $theme === 'store' ? 'selected' : '' }}>Toko</option>
        </select>
        <button type="submit">Simpan</button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
