<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    @include('layouts.navbar')
    <p>aakdhajd</p>
    <p>aakdhajd</p>

    <p>aakdhajd</p>

    <div>
        <p><strong>Username:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <!-- Tambahkan bidang lain dari profil pengguna di sini -->

        <!-- Form untuk logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
