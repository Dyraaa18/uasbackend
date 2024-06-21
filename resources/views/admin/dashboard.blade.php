<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admindashboard.css') }}">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <nav>
        <ul>
            <li><a href="{{ route('admin.doctors') }}">CRUD DOKTER</a></li>
            <li><a href="{{ route('admin.medicines') }}">CRUD OBAT</a></li>
        </ul>
    </nav>

    <!-- Tombol Logout -->
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <!-- Tampilkan Akun Pengguna -->
    <h2>Akun Pengguna</h2>
    @if(session('success'))
        <div class="notification">{{ session('success') }}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.updateUser', $user->id) }}">
                            @csrf
                            <input type="text" name="name" value="{{ $user->name }}">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.deleteUser', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Konten dashboard lainnya -->
</body>
</html>
