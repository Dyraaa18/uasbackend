<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tambahkan CSS atau framework yang Anda gunakan -->
</head>
<body>
    <h1>Admin Dashboard</h1>

    <!-- Tombol Logout -->
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <!-- Konten dashboard lainnya -->
</body>
</html>
