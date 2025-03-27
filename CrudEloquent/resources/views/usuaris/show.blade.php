<!DOCTYPE html>
<html>
<head>
    <title>Detalls Usuari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Detalls de l'Usuari</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $usuari->nom }}</h5>
                <p class="card-text">
                    <strong>Email:</strong> {{ $usuari->email }}<br>
                    <strong>Edat:</strong> {{ $usuari->edat }}
                </p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('usuaris.edit', $usuari) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('usuaris.index') }}" class="btn btn-secondary">Tornar</a>
        </div>
    </div>
</body>
</html>