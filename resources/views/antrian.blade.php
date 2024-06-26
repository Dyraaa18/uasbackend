<!DOCTYPE html>
<html>
<head>
    <title>Daftar Antrian</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @include('layouts.navbar')

    <div class="container mt-5">
        <h1>Daftar Antrian</h1>

        @if (session('success'))
            <script>
                window.onload = function() {
                    $('#successModal').modal('show');
                }
            </script>
        @endif

        <form id="antrianForm" action="{{ route('antrian.store') }}" method="POST" onsubmit="showModal(event)">
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

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Hartono Medica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama:</strong> <span id="modalNama"></span></p>
                    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    <p><strong>Telepon:</strong> <span id="modalTelepon"></span></p>
                    <p><strong>Poli:</strong> <span id="modalPoli"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetForm()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showModal(event) {
            event.preventDefault();
            var nama = document.getElementById('nama').value;
            var email = document.getElementById('email').value;
            var telepon = document.getElementById('telepon').value;
            var poli = document.getElementById('poli_id').options[document.getElementById('poli_id').selectedIndex].text;

            document.getElementById('modalNama').innerText = nama;
            document.getElementById('modalEmail').innerText = email;
            document.getElementById('modalTelepon').innerText = telepon;
            document.getElementById('modalPoli').innerText = poli;

            $('#successModal').modal('show');

            // Submit the form after showing the modal
            setTimeout(function() {
                document.getElementById('antrianForm').submit();
            }, 500); // Adjust the timeout as needed
        }

        function resetForm() {
            document.getElementById('antrianForm').reset();
        }
    </script>
</body>
</html>
