<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend P2</title>
    <style>
        :root {
            --bg: #0a0c10;
            --surface: #11151c;
            --surface-2: #0f141b;
            --primary: #1b3a4b;
            --primary-hover: #22485d;
            --text: #e5e7eb;
            --muted: #9ca3af;
            --border: #1f2937;
            --warn: #f59e0b;
            --danger: #ef4444;
            --success: #10b981;
        }
        * { box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, "Helvetica Neue", Arial, "Noto Sans", sans-serif; margin: 0; padding: 0; background: var(--bg); color: var(--text); }
        a { color: var(--text); }

        .bar { background: linear-gradient(90deg, #0b1217, var(--surface)); color: var(--text); padding: 14px 20px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 16px; }
        .brand { font-weight: 700; letter-spacing: .3px; color: var(--text); }
        .bar a { color: var(--text); text-decoration: none; font-weight: 600; opacity: .9; }
        .bar a:hover { opacity: 1; }

        .wrap { max-width: 980px; margin: 28px auto; padding: 0 20px; }

        .card { background: var(--surface); border: 1px solid var(--border); border-radius: 10px; box-shadow: 0 1px 0 rgba(255,255,255,0.03) inset, 0 8px 24px rgba(0,0,0,0.25); padding: 18px; }

        .btn { display: inline-block; padding: 10px 14px; border: 1px solid var(--border); border-radius: 8px; background: var(--surface-2); color: var(--text); text-decoration: none; transition: all .15s ease; }
        .btn:hover { transform: translateY(-1px); border-color: #2b3948; }
        .btn.primary { background: var(--primary); border-color: var(--primary); color: #e8f2f6; }
        .btn.primary:hover { background: var(--primary-hover); }
        .btn.warn { background: var(--primary); border-color: var(--primary); color: #e8f2f6; }
        .btn.warn:hover { background: var(--primary-hover); }
        .btn.danger { background: var(--danger); border-color: var(--danger); color: #fff; }
        .btn.danger:hover { filter: brightness(1.05); }

        table { width: 100%; border-collapse: collapse; background: var(--surface); border: 1px solid var(--border); border-radius: 10px; overflow: hidden; }
        thead th { background: #0e1319; color: var(--muted); text-transform: uppercase; font-size: 12px; letter-spacing: .08em; padding: 12px; border-bottom: 1px solid var(--border); }
        tbody td { padding: 12px; border-top: 1px solid var(--border); }
        tbody tr:hover { background: #0d1218; }

        h1 { margin: 0 0 16px; font-size: 22px; }
        .row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; }

        .msg { padding: 10px 12px; border: 1px solid rgba(16,185,129,.35); background: rgba(16,185,129,.15); color: #b7f3db; margin-bottom: 12px; border-radius: 8px; }

        label { display: block; margin-bottom: 6px; color: var(--muted); font-size: 13px; }
        input[type="text"], textarea { width: 100%; padding: 10px; border: 1px solid var(--border); background: var(--surface-2); color: var(--text); border-radius: 8px; outline: none; }
        input[type="text"]:focus, textarea:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(27,58,75,.25); }
    </style>
    </head>
<body>
<div class="bar">
    <div class="brand">Backend P2</div>
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
