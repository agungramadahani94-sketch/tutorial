<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --font: 'Segoe UI', system-ui, -apple-system, sans-serif;
            --radius: 10px;
            --radius-sm: 6px;
            --radius-lg: 16px;
            --shadow: 0 4px 24px rgba(0,0,0,.10);
            --shadow-sm: 0 1px 6px rgba(0,0,0,.07);
        }

        body {
            font-family: var(--font);
            min-height: 100vh;
            line-height: 1.6;
            color: #1a1a2e;
        }

        /* ── Alert ──────────────────────────────── */
        .alert {
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            margin-bottom: 16px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .alert-error   { background: #FEE2E2; color: #991B1B; border: 1px solid #FECACA; }
        .alert-success { background: #D1FAE5; color: #065F46; border: 1px solid #A7F3D0; }

        /* ── Form elements ──────────────────────── */
        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
            letter-spacing: .01em;
        }
        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 11px 14px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
            font-family: var(--font);
        }
        input:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .15);
        }
        .input-error {
            font-size: 12px;
            margin-top: 5px;
            font-weight: 500;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #6b7280;
            margin: 4px 0;
        }
        .checkbox-row input { width: auto; }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: var(--radius-sm);
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: .02em;
            transition: filter .15s, transform .1s;
            font-family: var(--font);
        }
        .btn:hover   { filter: brightness(1.06); }
        .btn:active  { transform: scale(.98); }

        /* ── Navbar dashboard ───────────────────── */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            height: 60px;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .navbar-brand {
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .navbar-user {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 14px;
        }
        .badge-role {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .logout-btn {
            padding: 7px 16px;
            border-radius: var(--radius-sm);
            border: none;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            background: rgba(255,255,255,.2);
            color: inherit;
            font-family: var(--font);
            transition: background .15s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .logout-btn:hover { background: rgba(255,255,255,.35); }

        /* ── Dashboard layout ───────────────────── */
        .page-content { padding: 32px; max-width: 1100px; margin: 0 auto; }
        .page-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .page-sub {
            font-size: 14px;
            margin-bottom: 28px;
            opacity: .75;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }
        .stat-card {
            border-radius: var(--radius);
            padding: 20px 22px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: var(--shadow-sm);
            transition: transform .2s;
        }
        .stat-card:hover { transform: translateY(-2px); }
        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }
        .stat-label { font-size: 12px; font-weight: 600; opacity: .7; margin-bottom: 3px; }
        .stat-value { font-size: 22px; font-weight: 800; }

        .info-section {
            background: rgba(255,255,255,.7);
            backdrop-filter: blur(8px);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow-sm);
        }
        .info-section h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(0,0,0,.06);
            font-size: 14px;
        }
        .info-row:last-child { border-bottom: none; }
        .info-key { opacity: .6; font-weight: 500; }
        .info-val { font-weight: 600; }

        @media (max-width: 640px) {
            .page-content { padding: 20px 16px; }
            .navbar { padding: 0 16px; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>
    @stack('styles')
</head>
<body>
@yield('content')
@stack('scripts')
</body>
</html>