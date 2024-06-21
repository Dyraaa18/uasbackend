<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD DOKTER</title>
    <link rel="stylesheet" href="{{ asset('css/crudDoctor.css') }}">
</head>
<body>
    <h1>CRUD DOKTER</h1>

    <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">DASHBOARD</a></li>
            <li><a href="{{ route('admin.medicines') }}">CRUD OBAT</a></li>
        </ul>
    </nav>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <section>
        <h2>{{ isset($doctor) ? 'Edit Dokter' : 'Tambah Dokter' }}</h2>
        <form method="POST" action="{{ isset($doctor) ? route('admin.updateDoctor', $doctor->id) : route('admin.storeDoctor') }}" enctype="multipart/form-data">
            @csrf
            @if (isset($doctor))
                @method('PUT')
            @endif
            <input type="text" name="name" placeholder="Nama Dokter" value="{{ old('name', isset($doctor) ? $doctor->name : '') }}" required>
            <input type="email" name="email" placeholder="Email Dokter" value="{{ old('email', isset($doctor) ? $doctor->email : '') }}" required>
            <input type="text" name="specialization" placeholder="Spesialisasi" value="{{ old('specialization', isset($doctor) ? $doctor->specialization : '') }}" required>
            <input type="text" name="address" placeholder="Alamat" value="{{ old('address', isset($doctor) ? $doctor->address : '') }}" required>
            <input type="text" name="working_hours" placeholder="Jam Kerja" value="{{ old('working_hours', isset($doctor) ? $doctor->working_hours : '') }}" required>
            
            @if (isset($doctor) && $doctor->image)
                <p>Gambar saat ini:</p>
                <img src="{{ asset('images/' . $doctor->image) }}" alt="Gambar Dokter" style="max-width: 200px;">
            @endif
            
            <input type="file" name="image" accept="image/*">
            <button type="submit">{{ isset($doctor) ? 'Update' : 'Tambah' }}</button>
        </form>
    </section>

    <section>
        <h2>Daftar Dokter</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Spesialisasi</th>
                    <th>Alamat</th>
                    <th>Jam Kerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->specialization }}</td>
                        <td>{{ $doctor->address }}</td>
                        <td>{{ $doctor->working_hours }}</td>
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
    </section>
</body>
</html>
