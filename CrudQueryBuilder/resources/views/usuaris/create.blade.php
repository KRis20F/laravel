<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Crear Nou Usuari</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('usuaris.store') }}">
            @csrf
            <div class="mb-3">
                <label>Nom:</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label>Edat:</label>
                <input type="number" name="edat" class="form-control" value="{{ old('edat') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('usuaris.index') }}" class="btn btn-secondary">Cancel·lar</a>
        </form>
    </div>
</body>
</html>