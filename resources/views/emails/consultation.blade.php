<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi</title>
</head>
<body>
    <p>Nama: {{ $details['name'] }}</p>
    <p>Email: {{ $details['email'] }}</p>
    <p>Pesan:</p>
    <p>{{ $details['message'] }}</p>
</body>
</html>
