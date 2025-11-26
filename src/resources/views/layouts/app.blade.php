<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NexusGame Store</title>
    <style>
        :root {
            --bg: #000000;
            --surface: #0c0f14;
            --surface-2: #0a0d12;
            --primary: #1b3a4b;
            --primary-hover: #22485d;
            --text: #e5e7eb;
            --muted: #9ca3af;
            --border: #1f2937;
            --danger: #ef4444;
        }
        * { box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, "Helvetica Neue", Arial, "Noto Sans", sans-serif; margin: 0; padding: 0; background: var(--bg); color: var(--text); }
        a { color: var(--text); }

        .bar { background: linear-gradient(90deg, #0b1217, #0b1217); color: var(--text); padding: 14px 20px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 18px; }
        .brand { display:flex; align-items:center; gap:10px; font-weight: 800; letter-spacing: .4px; color: var(--text); }
        .brand svg { width: 22px; height: 22px; fill: #1b3a4b; }
        .bar a { color: var(--text); text-decoration: none; font-weight: 600; opacity: .9; }
        .bar a:hover { opacity: 1; }

        .wrap { max-width: 1000px; margin: 28px auto; padding: 0 20px; }

        .card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; box-shadow: 0 1px 0 rgba(255,255,255,0.03) inset, 0 12px 28px rgba(0,0,0,0.35); padding: 20px; }

        .btn { display: inline-block; padding: 10px 14px; border: 1px solid var(--primary); border-radius: 10px; background: var(--primary); color: #e8f2f6; text-decoration: none; transition: all .15s ease; }
        .btn:hover { transform: translateY(-1px); filter: brightness(1.05); }
        .btn.primary { background: var(--primary); border-color: var(--primary); color: #e8f2f6; }
        .btn.primary:hover { background: var(--primary-hover); }
        .btn.warn { background: var(--primary); border-color: var(--primary); color: #e8f2f6; }
        .btn.warn:hover { background: var(--primary-hover); }
        .btn.danger { background: var(--danger); border-color: var(--danger); color: #fff; }
        .btn.danger:hover { filter: brightness(1.05); }

        table { width: 100%; border-collapse: collapse; background: var(--surface); border: 1px solid var(--border); border-radius: 12px; overflow: hidden; }
        thead th { background: #0a0f14; color: var(--muted); text-transform: uppercase; font-size: 12px; letter-spacing: .08em; padding: 12px; border-bottom: 1px solid var(--border); }
        tbody td { padding: 12px; border-top: 1px solid var(--border); }
        tbody tr:hover { background: #0a0d12; }

        h1 { margin: 0 0 16px; font-size: 22px; }
        .row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; }

        .msg { padding: 10px 12px; border: 1px solid rgba(16,185,129,.35); background: rgba(16,185,129,.12); color: #b7f3db; margin-bottom: 12px; border-radius: 8px; }

        label { display: block; margin-bottom: 6px; color: var(--muted); font-size: 13px; }
        input[type="text"], textarea { width: 100%; padding: 10px; border: 1px solid var(--border); background: var(--surface-2); color: var(--text); border-radius: 8px; outline: none; }
        input[type="text"]:focus, textarea:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(27,58,75,.25); }
    </style>
    </head>
<body>
<div class="bar">
    <div class="brand">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 6h10a3 3 0 0 1 3 3v4a3 3 0 0 1-3 3h-1.5a1.5 1.5 0 0 1-1.06-.44l-1.5-1.5h-2.88l-1.5 1.5A1.5 1.5 0 0 1 6.5 16H5a3 3 0 0 1-3-3V9a3 3 0 0 1 3-3Zm2.5 3.5h-2v2h2v-2Zm9 0h-2v2h2v-2Z"/></svg>
        NexusGame Store
    </div>
    <a href="{{ route('categorias.index') }}">Categorias</a>
    </div>
<div class="wrap">
    @if(session('success'))
        <div class="msg">{{ session('success') }}</div>
    @endif
    <div class="card">@yield('content')</div>
    </div>
</body>
</html>
