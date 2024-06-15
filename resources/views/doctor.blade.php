<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dokter</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .doctor-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .doctor-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-5">

        <!-- Tampilkan Pesan Sukses -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tampilkan Daftar Dokter -->
        <div class="row">
            @foreach($doctors as $doctor)
                <div class="col-md-4">
                    <div class="doctor-card">
                        @if ($doctor->image)
                            <img src="{{ asset('images/' . $doctor->image) }}" alt="{{ $doctor->name }}">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" alt="Default Image">
                        @endif
                        <h3>{{ $doctor->name }}</h3>
                        <p><strong>Email:</strong> {{ $doctor->email }}</p>
                        <p><strong>Spesialisasi:</strong> {{ $doctor->specialization }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
