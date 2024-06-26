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
    setTimeout(function () {
        document.getElementById('antrianForm').submit();
    }, 500); // Adjust the timeout as needed
}

function resetForm() {
    document.getElementById('antrianForm').reset();
}