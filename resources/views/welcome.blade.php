<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora IVA - Proyecto 1</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f4f4f4; }
        .card { background: white; padding: 2rem; border-radius: 10px; shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #333; }
    </style>
</head>
<body>
    <div class="card">
        <h1>📊 Mi Calculadora de IVA Profesional</h1>
        <p>Estado del sistema: <strong>Listo para calcular.</strong></p>
        <p>Inicia en el siguiente enlace: <a href="{{ route('form.iva') }}">Calcular</a></p>

    </div>
</body>
</html>
