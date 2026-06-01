<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jadwal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Tambah Jadwal</h2>

    <div class="mb-3">
        <input type="text"
               id="hari"
               class="form-control"
               placeholder="Hari">
    </div>

    <div class="mb-3">
        <input type="text"
               id="jam"
               class="form-control"
               placeholder="Jam">
    </div>

    <div class="mb-3">
        <input type="text"
               id="mapel"
               class="form-control"
               placeholder="Nama Mapel">
    </div>

    <div class="mb-3">
        <input type="text"
               id="guru"
               class="form-control"
               placeholder="Guru Pengampu">
    </div>

    <button onclick="simpanData()"
            class="btn btn-success">

        Simpan

    </button>

</div>

<script>

async function simpanData()
{
    await fetch('/api/jadwals', {

        method:'POST',

        headers:{
            'Content-Type':'application/json'
        },

        body:JSON.stringify({

            hari:
                document.getElementById('hari').value,

            jam:
                document.getElementById('jam').value,

            nama_mapel:
                document.getElementById('mapel').value,

            guru_pengampu:
                document.getElementById('guru').value

        })

    });

    alert('Data berhasil ditambah');

    window.location =
        '/dashboard';
}

</script>

</body>
</html>