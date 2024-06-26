<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Booking</title>
    <link rel="stylesheet" href="{{ asset('css/bookings.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
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

    <div class="container">
        <h1 class="text-center mb-4">Daftar Booking</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @foreach ($bookings as $booking)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $booking->name }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $booking->email }}</p>
                    <p class="card-text"><strong>Telepon:</strong> {{ $booking->phone }}</p>
                    <p class="card-text"><strong>Tanggal:</strong> {{ $booking->date }}</p>
                    <p class="card-text"><strong>Tenaga Kerja:</strong> {{ $booking->tenaga_kerja }}</p>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus booking ini?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
