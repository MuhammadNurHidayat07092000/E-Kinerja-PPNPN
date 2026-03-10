{{-- <h2>Edit Kegiatan</h2>

<form method="POST" action="{{ route('kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data">
    
    @csrf
    @method('PUT')

    <input type="date" name="tanggal" value="{{ $kegiatan->tanggal }}">
    <input type="text" name="uraian" value="{{ $kegiatan->uraian }}">
    <input type="text" name="output" value="{{ $kegiatan->output }}">
    <input type="time" name="jam_mulai" value="{{ $kegiatan->jam_mulai }}">
    <input type="time" name="jam_selesai" value="{{ $kegiatan->jam_selesai }}">

    <div>
        <label>Foto Baru (opsional)</label><br>
        @if($kegiatan->foto)
            <img src="{{ asset('storage/'.$kegiatan->foto) }}" width="120"><br>
        @endif
        <input type="file" name="foto">
    </div>

    <button type="submit">Update</button>
</form> --}}

@extends('layouts.ekin')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-semibold mb-6 text-gray-800">
        Edit Kegiatan Harian
    </h2>

    <form method="POST"
          action="{{ route('kegiatan.update', $kegiatan->id) }}"
          enctype="multipart/form-data"
          class="space-y-5">

        @csrf
        @method('PUT')

        <!-- Tanggal -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Tanggal
            </label>
            <input type="date"
                   name="tanggal"
                   value="{{ $kegiatan->tanggal }}"
                   class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Uraian -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Uraian Kegiatan
            </label>
            <input type="text"
                   name="uraian"
                   value="{{ $kegiatan->uraian }}"
                   class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Output -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Output
            </label>
            <input type="text"
                   name="output"
                   value="{{ $kegiatan->output }}"
                   class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Jam -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Jam Mulai
                </label>
                <input type="time"
                       name="jam_mulai"
                       value="{{ $kegiatan->jam_mulai }}"
                       class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Jam Selesai
                </label>
                <input type="time"
                       name="jam_selesai"
                       value="{{ $kegiatan->jam_selesai }}"
                       class="w-full border rounded-lg p-2">
            </div>
        </div>

        <!-- Foto -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Foto Kegiatan (Opsional)
            </label>

            @if($kegiatan->foto)
                <img src="{{ asset('storage/'.$kegiatan->foto) }}"
                     class="mb-3 w-48 rounded border">
            @endif

            <input type="file"
                   name="foto"
                   class="w-full border rounded-lg p-2">
        </div>

        <!-- Tombol -->
        <div class="flex justify-between pt-4">
            <a href="{{ route('kegiatan.index') }}"
               class="px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-gray-300">
                Batal
            </a>

            <button type="submit"
                    class="px-6 py-2 rounded bg-blue-600 text-black hover:bg-blue-700">
                Update Kegiatan
            </button>
        </div>

    </form>
</div>
@endsection
