<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Dokter</title>
    <!-- Tambahkan CSS atau framework yang Anda gunakan -->
</head>
<body>
    <h1>CRUD Dokter</h1>

    <!-- Tampilkan Pesan Sukses -->
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Form Tambah/Edit Dokter -->
    <h2>{{ isset($doctor) ? 'Edit Dokter' : 'Tambah Dokter' }}</h2>
    <form method="POST" action="{{ isset($doctor) ? route('admin.updateDoctor', $doctor->id) : route('admin.storeDoctor') }}" enctype="multipart/form-data">
        @csrf
        @if (isset($doctor))
            @method('PUT')
        @endif
        <input type="text" name="name" placeholder="Nama Dokter" value="{{ isset($doctor) ? $doctor->name : '' }}" required>
        <input type="email" name="email" placeholder="Email Dokter" value="{{ isset($doctor) ? $doctor->email : '' }}" required>
        <input type="text" name="specialization" placeholder="Spesialisasi" value="{{ isset($doctor) ? $doctor->specialization : '' }}" required>
        @if (isset($doctor) && $doctor->image)
            <p>Gambar saat ini:</p>
            <img src="{{ asset('images/' . $doctor->image) }}" alt="Gambar Dokter" style="max-width: 200px;">
        @endif
        <input type="file" name="image" accept="image/*"> <!-- Input untuk upload gambar -->
        <button type="submit">{{ isset($doctor) ? 'Update' : 'Tambah' }}</button>
    </form>

    <!-- Tampilkan Daftar Dokter -->
    <h2>Daftar Dokter</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Spesialisasi</th>
                <th>Gambar</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.updateDoctor', $doctor->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" value="{{ $doctor->name }}">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->specialization }}</td>
                    <td>
                        @if ($doctor->image)
                            <img src="{{ asset('images/' . $doctor->image) }}" alt="{{ $doctor->name }}" style="max-width: 100px;">
                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $doctor->created_at }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.deleteDoctor', $doctor->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
