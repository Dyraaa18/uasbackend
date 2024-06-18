<!DOCTYPE html>
<html>
<head>
    <title>Daftar Antrian</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('layouts.navbar')

    <div class="container mt-5">
        <h1>Daftar Antrian</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('antrian.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon:</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="form-group">
                <label for="poli_id">Poli:</label>
                <select class="form-control" id="poli_id" name="poli_id" required>
                    @foreach($polis as $poli)
                        <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
