<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OBAT</title>
    <link rel="stylesheet" href="{{ asset('css/crudMedicine.css') }}">
</head>
<body>
    <h1>CRUD OBAT</h1>

    <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">DASHBOARD</a></li>
            <li><a href="{{ route('admin.doctors') }}">CRUD DOKTER</a></li>
        </ul>
    </nav>

    <!-- Tampilkan Pesan Sukses -->
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <section>
        <!-- Form Tambah/Edit Obat -->
        <h2>{{ isset($medicine) ? 'Edit Obat' : 'Tambah Obat' }}</h2>
        <form method="POST" action="{{ isset($medicine) ? route('admin.updateMedicine', $medicine->id) : route('admin.storeMedicine') }}" enctype="multipart/form-data">
            @csrf
            @if (isset($medicine))
                @method('PUT')
            @endif
            <input type="text" name="name" placeholder="Nama Obat" value="{{ old('name', isset($medicine) ? $medicine->name : '') }}" required>
            <textarea name="description" placeholder="Deskripsi" required>{{ old('description', isset($medicine) ? $medicine->description : '') }}</textarea>
            <input type="number" name="stock" placeholder="Stock" value="{{ old('stock', isset($medicine) ? $medicine->stock : '') }}" required>
            <input type="text" name="price" placeholder="Harga (ribuan / ratusan)" pattern="[0-9]*" title="Harga harus dalam format angka" value="{{ old('price', isset($medicine) ? number_format($medicine->price, 0, ',', '.') : '') }}" required>
            
            @if (isset($medicine) && $medicine->image)
                <p>Gambar saat ini:</p>
                <img src="{{ asset('images/' . $medicine->image) }}" alt="Gambar Obat" style="max-width: 200px;">
            @endif
            
            <input type="file" name="image" accept="image/*">
            <button type="submit">{{ isset($medicine) ? 'Update' : 'Tambah' }}</button>
        </form>
    </section>

    <section>
        <!-- Tampilkan Daftar Obat -->
        <h2>Daftar Obat</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Stock</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicines as $medicine)
                    <tr>
                        <td>{{ $medicine->name }}</td>
                        <td>{{ $medicine->description }}</td>
                        <td>{{ $medicine->stock }}</td>
                        <td>{{ $medicine->price }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.deleteMedicine', $medicine->id) }}">
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
