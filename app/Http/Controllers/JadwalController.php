<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JadwalController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return response()->json(
            Jadwal::all()
        );
    }

    public function store(Request $request)
    {
        $this->authorize('create', Jadwal::class);

        $jadwal = Jadwal::create(
            $request->all()
        );

        return response()->json(
            $jadwal,
            201
        );
    }

    public function show(string $id)
    {
        return response()->json(
            Jadwal::findOrFail($id)
        );
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $this->authorize('update', $jadwal);

        $jadwal->update(
            $request->except('_method')
        );

        return response()->json(
            $jadwal
        );
    }

    public function destroy(Jadwal $jadwal)
    {
        $this->authorize('delete', $jadwal);

        $jadwal->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }

    public function dashboard($hari = null)
    {
        $jadwals = collect();

        if ($hari) {

            $jadwals = Jadwal::where(
                'hari',
                $hari
            )->orderBy('jam')
                ->get();
        }

        return view(
            'dashboard',
            compact('jadwals', 'hari')
        );
    }
}
