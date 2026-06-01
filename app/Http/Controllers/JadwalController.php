<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{

    public function index()
    {
        return response()->json(
            Jadwal::all()
        );
    }

    public function store(Request $request)
    {
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

    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update(
            $request->all()
        );

        return response()->json(
            $jadwal
        );
    }

    public function destroy(string $id)
    {
        Jadwal::destroy($id);

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