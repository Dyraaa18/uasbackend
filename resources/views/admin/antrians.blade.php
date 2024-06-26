<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/crudantrian.css') }}">
    <title>Daftar Antrian</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">DASHBOARD</a></li>
            <li><a href="{{ route('admin.medicines') }}">CRUD OBAT</a></li>
            <li><a href="{{ route('admin.doctors') }}">CRUD DOKTER</a></li>
            <li><a href="{{ route('admin.antrians') }}">CRUD ANTRIAN</a></li>
        </ul>
    </nav>
    <div class="container mt-4">
        <h1 class="my-4">Daftar Antrian</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <h2 class="mb-0">Antrian Hari Ini</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Poli</th>
                            <th>Tanggal</th>
                            <th>Nomor Antrian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($antrians as $antrian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $antrian->nama }}</td>
                                <td>{{ $antrian->email }}</td>
                                <td>{{ $antrian->telepon }}</td>
                                <td>{{ $antrian->poli->nama }}</td>
                                <td>{{ $antrian->tanggal }}</td>
                                <td>{{ $antrian->nomor_antrian }}</td>
                                <td>
                                    <form action="{{ route('antrians.destroy', $antrian->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus antrian ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
