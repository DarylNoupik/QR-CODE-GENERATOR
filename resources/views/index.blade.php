<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Générateur de QR Codes</h1>

    <!-- Formulaire -->
    <form method="POST" action="{{ route('generate') }}" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="name" class="form-control" placeholder="Entrez un nom" required>
            <button class="btn btn-primary" type="submit">Générer QR Code</button>
        </div>
        @error('name')
        <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </form>

    <!-- Table des noms et QR codes -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>QR Code</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($names as $name)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $name->name }}</td>
                <td>
                    <img src="{{ asset($name->qr_code_path) }}" alt="QR Code" width="100">
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">Aucun nom trouvé.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
