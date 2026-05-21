@extends('layout.app')

@section('title', 'Login — RS Medika Sehat')

@push('styles')
<style>
    :root {
        --primary: #1D4ED8;
        --primary-dark: #1e40af;
        --primary-light: #EFF6FF;
        --accent: #06B6D4;
    }

    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0c4a6e 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    /* Decorative background circles */
    body::before {
        content: '';
        position: absolute;
        width: 600px; height: 600px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(6,182,212,.15) 0%, transparent 70%);
        top: -200px; right: -200px;
        pointer-events: none;
    }
    body::after {
        content: '';
        position: absolute;
        width: 400px; height: 400px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(29,78,216,.2) 0%, transparent 70%);
        bottom: -150px; left: -150px;
        pointer-events: none;
    }

    .login-wrapper {
        display: flex;
        width: 900px;
        max-width: 95vw;
        min-height: 540px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 80px rgba(0,0,0,.5);
        position: relative;
        z-index: 1;
    }

    /* ── Left panel ── */
    .panel-left {
        width: 42%;
        background: linear-gradient(160deg, #1D4ED8 0%, #0ea5e9 100%);
        padding: 48px 40px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .panel-left::before {
        content: '🏥';
        position: absolute;
        font-size: 180px;
        bottom: -20px;
        right: -30px;
        opacity: .12;
        transform: rotate(-10deg);
    }
    .hospital-logo {
        width: 54px; height: 54px;
        background: rgba(255,255,255,.2);
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 26px;
        margin-bottom: 20px;
        backdrop-filter: blur(4px);
    }
    .panel-left h1 {
        font-size: 26px;
        font-weight: 800;
        line-height: 1.25;
        margin-bottom: 12px;
    }
    .panel-left p {
        font-size: 14px;
        opacity: .85;
        line-height: 1.65;
    }
    .panel-features { list-style: none; margin-top: 28px; }
    .panel-features li {
        font-size: 13px;
        opacity: .9;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .panel-features li::before { content: '✦'; font-size: 10px; }
    .panel-footer {
        font-size: 12px;
        opacity: .6;
        margin-top: auto;
    }

    /* ── Right panel (form) ── */
    .panel-right {
        flex: 1;
        background: #fff;
        padding: 48px 44px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .form-header { margin-bottom: 28px; }
    .form-header h2 { font-size: 22px; font-weight: 800; color: #0f172a; }
    .form-header p  { font-size: 13px; color: #64748b; margin-top: 4px; }

    label { color: #374151; }
    input[type="email"], input[type="password"] {
        border: 1.5px solid #E2E8F0;
        background: #F8FAFC;
        color: #0f172a;
        margin-bottom: 16px;
    }
    input:focus {
        border-color: var(--primary);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(29,78,216,.12);
    }

    .btn-hospital {
        background: linear-gradient(135deg, var(--primary) 0%, #0ea5e9 100%);
        color: white;
        margin-top: 8px;
    }

    .portal-links {
        margin-top: 20px;
        padding-top: 16px;
        border-top: 1px solid #F1F5F9;
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
    }
    .portal-links a {
        font-size: 12px;
        color: #94a3b8;
        text-decoration: none;
        padding: 4px 10px;
        border-radius: 20px;
        border: 1px solid #E2E8F0;
        transition: all .2s;
    }
    .portal-links a:hover { background: #F1F5F9; color: #475569; }
</style>
@endpush

@section('content')
<div class="login-wrapper">
    <!-- Panel Kiri -->
    <div class="panel-left">
        <div>
            <div class="hospital-logo">🏥</div>
            <h1>RS Medika<br>Sehat</h1>
            <p>Sistem Informasi Manajemen Rumah Sakit Terintegrasi</p>
            <ul class="panel-features">
                <li>Rekam medis elektronik</li>
                <li>Manajemen jadwal dokter</li>
                <li>Monitoring stok farmasi</li>
                <li>Laporan keuangan real-time</li>
            </ul>
        </div>
        <p class="panel-footer">© 2024 RS Medika Sehat · v2.4.1</p>
    </div>

    <!-- Panel Kanan (Form) -->
    <div class="panel-right">
        <div class="form-header">
            <h2>Selamat Datang</h2>
            <p>Masuk dengan akun karyawan RS Medika Sehat</p>
        </div>

        @if (session('error'))
            <div class="alert alert-error">⚠ {{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">✓ {{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div>
                <label for="email">ID Karyawan / Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="dr.budi@rsmedika.id"
                    required
                    autocomplete="email"
                >
                @error('email')
                    <p class="input-error" style="color:#DC2626">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password">Kata Sandi</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan kata sandi"
                    required
                    autocomplete="current-password"
                >
                @error('password')
                    <p class="input-error" style="color:#DC2626">{{ $message }}</p>
                @enderror
            </div>

            <div class="checkbox-row">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" style="margin:0; font-weight:400;">Ingat saya selama 30 hari</label>
            </div>

            <button type="submit" class="btn btn-hospital" style="margin-top:20px">
                Masuk ke Sistem →
            </button>
        </form>

        <div class="portal-links">
            <span style="font-size:12px; color:#94a3b8; align-self:center;">Portal lain:</span>
            <a href="{{ route('login.restaurant') }}">🍜 Rumah Makan</a>
            <a href="{{ route('login.store') }}">🏪 Toko</a>
        </div>
    </div>
</div>
@endsection