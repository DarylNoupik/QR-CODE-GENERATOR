<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générer un QR Code</title>
</head>
<body>
<h1>Générer un QR Code</h1>
<form action="{{ route('qrcode.store') }}" method="POST">
    @csrf
    <label for="text">Entrez un texte :</label>
    <input type="text" name="text" id="text" required>
    <button type="submit">Générer QR Code</button>
</form>
</body>
</html>
