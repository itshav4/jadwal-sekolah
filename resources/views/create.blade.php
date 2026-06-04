<!DOCTYPE html>
<html>

<head>
    <title>Tambah Jadwal</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">

        <h2>Tambah Jadwal</h2>

        <div class="mb-3">
            <label>Hari</label>
            <input type="text" id="hari" class="form-control" placeholder="Hari">
        </div>

        <div class="mb-3">
            <label>Jam</label>
            <input type="text" id="jam" class="form-control" placeholder="Jam">
        </div>

        <div class="mb-3">
            <label>Nama Mapel</label>
            <input type="text" id="mapel" class="form-control" placeholder="Nama Mapel">
        </div>

        <div class="mb-3">
            <label>Guru Pengampu</label>
            <input type="text" id="guru" class="form-control" placeholder="Guru Pengampu">
        </div>

        <button onclick="simpanData()" class="btn btn-success">

            Simpan

        </button>

        <a href="/dashboard" class="btn btn-secondary">Batal</a>

    </div>

    <script>
    async function simpanData() {
        try {
            const response = await fetch('/api/jadwals', {

                method: 'POST',
                credentials: 'include',

                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },

                body: JSON.stringify({

                    hari: document.getElementById('hari').value,

                    jam: document.getElementById('jam').value,

                    nama_mapel: document.getElementById('mapel').value,

                    guru_pengampu: document.getElementById('guru').value

                })

            });

            const data = await response.json();

            if (!response.ok) {
                alert('Error: ' + (data.message || 'Tidak bisa menambah data'));
                return;
            }

            alert('Data berhasil ditambah');

            window.location =
                '/dashboard';

        } catch (error) {
            alert('Error: ' + error.message);
        }
    }
    </script>

    @csrf

</body>

</html>