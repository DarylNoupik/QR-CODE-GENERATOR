<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Généré</title>
</head>
<body>
<h1>Votre QR Code</h1>
<p>Texte : {{ $qrcode->input_text }}</p>
<img src="{{ asset($qrcode->qr_code_path) }}" alt="QR Code">
<a href="{{ asset($qrcode->qr_code_path) }}" download>Télécharger le QR Code</a>
</body>
</html>
