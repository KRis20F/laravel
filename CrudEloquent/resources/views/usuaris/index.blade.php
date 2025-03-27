<!DOCTYPE html>
<html>
<head>
    <title>Gestió d'Usuaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Llista d'Usuaris</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('usuaris.create') }}" class="btn btn-primary mb-3">Nou Usuari</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Edat</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuaris as $usuari)
                <tr>
                    <td>{{ $usuari->id }}</td>
                    <td>{{ $usuari->nom }}</td>
                    <td>{{ $usuari->email }}</td>
                    <td>{{ $usuari->edat }}</td>
                    <td>
                        <a href="{{ route('usuaris.edit', $usuari) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('usuaris.destroy', $usuari) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Estàs segur?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>