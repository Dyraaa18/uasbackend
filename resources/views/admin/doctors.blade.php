<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/crudDoctor.css') }}"> <!-- Sesuaikan path dengan lokasi file CSS Anda -->
</head>
<body>
    <h1>CRUD Dokter</h1>

    <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        </ul>
    </nav>

    <!-- Tampilkan Pesan Sukses -->
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <section>
        <!-- Form Tambah/Edit Dokter -->
        <h2>{{ isset($doctor) ? 'Edit Dokter' : 'Tambah Dokter' }}</h2>
       <!-- Form Tambah/Edit -->
        <form method="POST" action="{{ isset($doctor) ? route('admin.updateDoctor', $doctor->id) : route('admin.storeDoctor') }}" enctype="multipart/form-data">
            @csrf
            @if (isset($doctor))
                @method('PUT')
            @endif
            <input type="text" name="name" placeholder="Nama Dokter" value="{{ old('name', isset($doctor) ? $doctor->name : '') }}" required><br><br>
            <input type="email" name="email" placeholder="Email Dokter" value="{{ old('email', isset($doctor) ? $doctor->email : '') }}" required><br><br>
            <input type="text" name="specialization" placeholder="Spesialisasi" value="{{ old('specialization', isset($doctor) ? $doctor->specialization : '') }}" required><br><br>
            <input type="text" name="address" placeholder="Alamat" value="{{ old('address', isset($doctor) ? $doctor->address : '') }}" required><br><br>
            <input type="text" name="working_hours" placeholder="Jam Kerja" value="{{ old('working_hours', isset($doctor) ? $doctor->working_hours : '') }}" required><br><br>
            
            @if (isset($doctor) && $doctor->image)
                <p>Gambar saat ini:</p>
                <img src="{{ asset('images/' . $doctor->image) }}" alt="Gambar Dokter" style="max-width: 200px;"><br><br>
            @endif
            
            <input type="file" name="image" accept="image/*"><br><br>
            <button type="submit">{{ isset($doctor) ? 'Update' : 'Tambah' }}</button>
        </form>

    </section>

    <section>
        <!-- Tampilkan Daftar Dokter -->
        <h2>Daftar Dokter</h2>
        <table border="1">
            <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>
                            <!-- Form Tambah/Edit -->
                            <form method="POST" action="{{ isset($doctor) ? route('admin.updateDoctor', $doctor->id) : route('admin.storeDoctor') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" placeholder="Nama Dokter" value="{{ old('name', isset($doctor) ? $doctor->name : '') }}" required><br><br>
                                <input type="email" name="email" placeholder="Email Dokter" value="{{ old('email', isset($doctor) ? $doctor->email : '') }}" required><br><br>
                                <input type="text" name="specialization" placeholder="Spesialisasi" value="{{ old('specialization', isset($doctor) ? $doctor->specialization : '') }}" required><br><br>
                                <input type="text" name="address" placeholder="Alamat" value="{{ old('address', isset($doctor) ? $doctor->address : '') }}" required><br><br>
                                <input type="text" name="working_hours" placeholder="Jam Kerja" value="{{ old('working_hours', isset($doctor) ? $doctor->working_hours : '') }}" required><br><br>                           
                                <input type="file" name="image" accept="image/*"><br><br>
                                <button type="submit">{{ isset($doctor) ? 'Update' : 'Tambah' }}</button>
                            </form>

                        </td>
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
