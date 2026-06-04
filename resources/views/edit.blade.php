<!DOCTYPE html>
<html>

<head>

    <title>Edit Jadwal</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-4">

        <h2>Edit Jadwal</h2>

        <input type="hidden" id="id" value="{{ $jadwal->id }}">

        <div class="mb-3">
            <label>Hari</label>
            <input type="text" id="hari" value="{{ $jadwal->hari }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jam</label>
            <input type="text" id="jam" value="{{ $jadwal->jam }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Mapel</label>
            <input type="text" id="mapel" value="{{ $jadwal->nama_mapel }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Guru</label>
            <input type="text" id="guru" value="{{ $jadwal->guru_pengampu }}" class="form-control">
        </div>

        <button onclick="updateData()" class="btn btn-warning">

            Update

        </button>

        <a href="/dashboard" class="btn btn-secondary">Batal</a>

    </div>

    <script>
    async function updateData() {
        const id =
            document.getElementById('id').value;

        try {
            const response = await fetch(
                '/jadwals/' + id, {
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

                }
            );

            const data = await response.json();

            if (!response.ok) {
                alert('Error: ' + (data.message || 'Tidak bisa mengupdate data'));
                return;
            }

            alert('Data berhasil diupdate');

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