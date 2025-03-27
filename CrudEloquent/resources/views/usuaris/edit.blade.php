<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Editar Usuari</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('usuaris.update', $usuari) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nom:</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom', $usuari->nom) }}" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $usuari->email) }}" required>
            </div>
            <div class="mb-3">
                <label>Edat:</label>
                <input type="number" name="edat" class="form-control" value="{{ old('edat', $usuari->edat) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualitzar</button>
            <a href="{{ route('usuaris.index') }}" class="btn btn-secondary">Cancel·lar</a>
        </form>
    </div>
</body>
</html>