<!DOCTYPE html>
<html>

<head>

    <title>Dashboard Jadwal Sekolah</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2>Dashboard Jadwal Sekolah</h2>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="btn btn-danger">
                    Logout
                </button>

            </form>

        </div>
        <a href="/jadwal/create"
            class="btn btn-success mb-3">

            + Tambah Jadwal

        </a>
        <div class="mb-4">

            <a href="/dashboard/Senin"
                class="btn btn-primary">

                Senin

            </a>

            <a href="/dashboard/Selasa"
                class="btn btn-success">

                Selasa

            </a>

            <a href="/dashboard/Rabu"
                class="btn btn-warning">

                Rabu

            </a>

            <a href="/dashboard/Kamis"
                class="btn btn-info">

                Kamis

            </a>

            <a href="/dashboard/Jumat"
                class="btn btn-dark">

                Jumat

            </a>

        </div>

        @if($hari)

        <div class="card">

            <div class="card-header bg-primary text-white">

                <h4 class="mb-0">
                    Jadwal Hari {{ $hari }}
                </h4>

            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th>Jam</th>
                            <th>Mapel</th>
                            <th>Guru</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($jadwals as $item)

                        <tr>

                            <<td>{{ $item->jam }}</td>
                                <td>{{ $item->nama_mapel }}</td>
                                <td>{{ $item->guru_pengampu }}</td>

                                <td>

                                    @can('update', $item)
                                    <a href="/jadwal/edit/{{ $item->id }}"
                                        class="btn btn-warning btn-sm">

                                        Edit

                                    </a>
                                    @endcan

                                    @can('delete', $item)
                                    <button
                                        onclick="hapusData('{{ $item->id }}')"
                                        class="btn btn-danger btn-sm">

                                        Hapus

                                    </button>
                                    @endcan

                                </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" class="text-center">

                                Tidak ada jadwal untuk hari ini

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        @else

        <div class="alert alert-info">

            Silakan pilih hari terlebih dahulu.

        </div>

        @endif

    </div>
    <script>
        async function hapusData(id) {
            if (!confirm('Yakin hapus data?')) {
                return;
            }

            try {
                const response = await fetch(
                    '/api/jadwals/' + id, {
                        method: 'DELETE',
                        credentials: 'include',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    }
                );

                const data = await response.json();

                if (!response.ok) {
                    alert('Error: ' + (data.message || 'Tidak bisa menghapus data'));
                    return;
                }

                alert('Data berhasil dihapus');
                location.reload();

            } catch (error) {
                alert('Error: ' + error.message);
            }
        }
    </script>
</body>

</html>