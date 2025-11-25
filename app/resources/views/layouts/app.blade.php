<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend P2</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .bar { background: #222; color: #fff; padding: 12px 16px; }
        .bar a { color: #fff; text-decoration: none; font-weight: bold; }
        .wrap { max-width: 900px; margin: 24px auto; padding: 0 16px; }
        .btn { display: inline-block; padding: 8px 12px; border: 1px solid #444; background: #eee; color: #000; text-decoration: none; }
        .btn.primary { background: #2e6; border-color: #2e6; }
        .btn.warn { background: #fb3; border-color: #fb3; }
        .btn.danger { background: #e44; border-color: #e44; color: #fff; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        h1 { margin: 0 0 16px; }
        .row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
        .msg { padding: 8px; border: 1px solid #6c6; background: #cfc; margin-bottom: 12px; }
        label { display: block; margin-bottom: 4px; }
        input[type="text"], textarea { width: 100%; padding: 8px; border: 1px solid #ccc; }
    </style>
</head>
<body>
<div class="bar"><a href="{{ route('categorias.index') }}">Categorias</a></div>
<div class="wrap">
    @if(session('success'))
        <div class="msg">{{ session('success') }}</div>
    @endif
    @yield('content')
    </div>
</body>
</html>