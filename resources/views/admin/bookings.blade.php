<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Booking</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px 0;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .card-text {
            margin-bottom: 5px;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">DASHBOARD</a></li>
            <li><a href="{{ route('admin.medicines') }}">CRUD OBAT</a></li>
            <li><a href="{{ route('admin.doctors') }}">CRUD DOKTER</a></li>
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
