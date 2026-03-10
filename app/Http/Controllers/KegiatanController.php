<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class KegiatanController extends Controller
{
     public function index()
    // {
    //     $kegiatans = 
    //         auth()
    //         ->user()
    //         ->kegiatans()
    //         ->latest()
    //         ->get();

    //     return view('kegiatan.index', compact('kegiatans'));
    // }

    {
        //Filter Berdasarkan User
        $kegiatans = Kegiatan::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required',
            'output' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kegiatan', 'public');
        }

        Kegiatan::create([
            // 'user_id' => auth()->id(),
            // ...$request->all()

            // Opsi 2
            'user_id' => auth()->id(),
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'output' => $request->output,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'foto' => $fotoPath,
        ]);

        return redirect()
            ->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil disimpan');
    }

    // public function show(Kegiatan $kegiatan)
    // {
    //     $this->authorizeOwner($kegiatan);
    //     return view('kegiatan.show', compact('kegiatan'));
    // }

    public function show($id)
    {
        $kegiatan = Kegiatan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('kegiatan.show', compact('kegiatan'));
    }


    public function edit(Kegiatan $kegiatan)
    {
        $this->authorizeOwner($kegiatan);
        return view('kegiatan.edit', compact('kegiatan'));
    }

     public function update(Request $request, Kegiatan $kegiatan)
    {
        $this->authorizeOwner($kegiatan);

        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required',
            'output' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($kegiatan->foto) {
                Storage::disk('public')->delete($kegiatan->foto);
            }
            $kegiatan->foto = $request->file('foto')->store('kegiatan', 'public');
        }

        $kegiatan->update([
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'output' => $request->output,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'foto' => $kegiatan->foto,
        ]);

        return redirect()
            ->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $this->authorizeOwner($kegiatan);

        if ($kegiatan->foto) {
            Storage::disk('public')->delete($kegiatan->foto);
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus');
    }

    private function authorizeOwner(Kegiatan $kegiatan)
    {
        if ($kegiatan->user_id !== auth()->id()) {
            abort(403);
        }
    }

    public function rekapBulanan(Request $request)
    {
        $bulan = $request->bulan ?? now()->month;
        $tahun = $request->tahun ?? now()->year;

        $kegiatans = Kegiatan::where('user_id', auth()->id())
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->orderBy('tanggal')
            ->get();

        return view('kegiatan.rekap', compact(
            'kegiatans',
            'bulan',
            'tahun'
        ));
    }
}
