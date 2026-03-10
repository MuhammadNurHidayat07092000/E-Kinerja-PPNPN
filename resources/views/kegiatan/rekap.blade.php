@extends('layouts.ekin')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-semibold mb-4">
        Rekap Kegiatan Bulanan
    </h2>

    <!-- Filter Bulan -->
    <form method="GET" class="flex gap-4 mb-6">
        <select name="bulan" class="border rounded p-2">
            @for($i=1; $i<=12; $i++)
                <option value="{{ $i }}"
                    {{ $bulan == $i ? 'selected' : '' }}>
                    {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                </option>
            @endfor
        </select>

        <select name="tahun" class="border rounded p-2">
            @for($y = now()->year; $y >= now()->year - 5; $y--)
                <option value="{{ $y }}"
                    {{ $tahun == $y ? 'selected' : '' }}>
                    {{ $y }}
                </option>
            @endfor
        </select>

        <button class="bg-blue-600 text-white px-4 rounded">
            Tampilkan
        </button>
    </form>

    <!-- Tabel Rekap -->
    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Uraian</th>
                <th class="border p-2">Output</th>
                <th class="border p-2">Jam</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kegiatans as $kegiatan)
            <tr>
                <td class="border p-2">{{ $kegiatan->tanggal }}</td>
                <td class="border p-2">{{ $kegiatan->uraian }}</td>
                <td class="border p-2">{{ $kegiatan->output }}</td>
                <td class="border p-2">
                    {{ $kegiatan->jam_mulai }} - {{ $kegiatan->jam_selesai }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center p-4 text-gray-500">
                    Tidak ada kegiatan pada bulan ini
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Ringkasan -->
    <div class="mt-4 text-sm text-gray-700">
        Total kegiatan: <b>{{ $kegiatans->count() }}</b>
    </div>

</div>
@endsection
