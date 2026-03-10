{{-- <h2>Detail Kegiatan</h2>

<p>Tanggal: {{ $kegiatan->tanggal }}</p>
<p>Uraian: {{ $kegiatan->uraian }}</p>
<p>Output: {{ $kegiatan->output }}</p>
<p>Jam: {{ $kegiatan->jam_mulai }} - {{ $kegiatan->jam_selesai }}</p>

@if($kegiatan->foto)
<img src="{{ asset('storage/'.$kegiatan->foto) }}" width="200">
@endif

<br><br>
<a href="{{ route('kegiatan.index') }}">Kembali</a --}}

@extends('layouts.ekin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Detail Kegiatan</h2>

    <div class="mb-2">
        <strong>Tanggal:</strong>
        {{ $kegiatan->tanggal }}
    </div>

    <div class="mb-2">
        <strong>Uraian:</strong>
        {{ $kegiatan->uraian }}
    </div>

    <div class="mb-2">
        <strong>Output:</strong>
        {{ $kegiatan->output }}
    </div>

    <div class="mb-4">
        <strong>Jam:</strong>
        {{ $kegiatan->jam_mulai }} – {{ $kegiatan->jam_selesai }}
    </div>

    {{-- FOTO KEGIATAN --}}
    <div class="mt-4">
        <strong>Foto Kegiatan:</strong>

        @if($kegiatan->foto)
            <img src="{{ asset('storage/' . $kegiatan->foto) }}"
                alt="Foto kegiatan"
                class="mt-2 w-full max-w-md rounded border">
        @else
            <p class="text-gray-500 mt-2 italic">
                Tidak ada foto kegiatan
            </p>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ route('kegiatan.index') }}"
           class="text-blue-600 hover:underline">
            ← Kembali
        </a>
    </div>

</div>
@endsection
