<!DOCTYPE html>
<html>
<head>

<title>Edit Jadwal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>Edit Jadwal</h2>

<input type="hidden"
       id="id"
       value="{{ $jadwal->id }}">

<div class="mb-3">
<input type="text"
       id="hari"
       value="{{ $jadwal->hari }}"
       class="form-control">
</div>

<div class="mb-3">
<input type="text"
       id="jam"
       value="{{ $jadwal->jam }}"
       class="form-control">
</div>

<div class="mb-3">
<input type="text"
       id="mapel"
       value="{{ $jadwal->nama_mapel }}"
       class="form-control">
</div>

<div class="mb-3">
<input type="text"
       id="guru"
       value="{{ $jadwal->guru_pengampu }}"
       class="form-control">
</div>

<button
onclick="updateData()"
class="btn btn-warning">

Update

</button>

</div>

<script>

async function updateData()
{
    const id =
        document.getElementById('id').value;

    await fetch(
        '/api/jadwals/' + id,
        {

            method:'PUT',

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

        }
    );

    alert('Data berhasil diupdate');

    window.location =
        '/dashboard';
}

</script>

</body>
</html>