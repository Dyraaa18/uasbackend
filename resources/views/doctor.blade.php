<!-- resources/views/doctors.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/doctor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>

    @include('layouts.navbar')

    <div class="container mt-5">
        @foreach (collect($doctors)->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $doctor)
                    <div class="col">
                        <div class="doctor-card">
                            <div class="doctor-title">{{ $doctor['name'] }}</div>
                            <div class="doctor-specialty">{{ $doctor['specialty'] }}</div>
                            <p>{{ $doctor['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</body>
</html>
