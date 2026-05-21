@extends('layout.app')

@section('title', 'Pilih Portal Login')

@push('styles')
<style>
    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #071b2c 0%, #0f172a 100%);
        color: #f8fafc;
    }
    .selection-wrapper {
        width: min(1024px, 96vw);
        padding: 28px;
        border-radius: 24px;
        background: rgba(15, 23, 42, .92);
        box-shadow: 0 28px 80px rgba(0,0,0,.35);
        border: 1px solid rgba(255,255,255,.08);
    }
    .selection-title {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 18px;
    }
    .selection-sub {
        opacity: .78;
        margin-bottom: 28px;
        max-width: 700px;
        line-height: 1.8;
    }
    .portal-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 18px;
    }
    .portal-card {
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 22px;
        padding: 24px;
        transition: transform .2s, border-color .2s, background .2s;
    }
    .portal-card:hover {
        transform: translateY(-4px);
        border-color: rgba(59,130,246,.4);
        background: rgba(255,255,255,.13);
    }
    .portal-card h3 {
        margin-bottom: 10px;
        font-size: 20px;
        font-weight: 700;
    }
    .portal-card p {
        opacity: .78;
        margin-bottom: 18px;
        line-height: 1.7;
    }
    .portal-card a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 999px;
        background: #e2e8f0;
        color: #0f172a;
        text-decoration: none;
        font-weight: 700;
    }
</style>
@endpush

@section('content')
<div class="selection-wrapper">
    <div class="selection-title">Pilih Portal Login</div>
    <div class="selection-sub">Akses portal dengan tema yang sesuai: Rumah Sakit untuk layanan kesehatan, Rumah Makan untuk manajemen restoran, dan Toko untuk transaksi retail.</div>

    <div class="portal-grid">
        <article class="portal-card">
            <h3>🏥 Rumah Sakit</h3>
            <p>Login dengan tema Rumah Sakit untuk mengelola pasien, dokter, dan layanan klinik.</p>
            <a href="{{ route('login.hospital') }}">Masuk ke Rumah Sakit</a>
        </article>

        <article class="portal-card">
            <h3>🍜 Rumah Makan</h3>
            <p>Login dengan tema Rumah Makan untuk memantau pesanan, menu, dan meja.</p>
            <a href="{{ route('login.restaurant') }}">Masuk ke Rumah Makan</a>
        </article>

        <article class="portal-card">
            <h3>🏪 Toko</h3>
            <p>Login dengan tema Toko untuk mengelola produk, kasir, dan laporan penjualan.</p>
            <a href="{{ route('login.store') }}">Masuk ke Toko</a>
        </article>
    </div>
</div>
@endsection