@extends('layouts.ekin')

@section('content')
<h2 class="text-2xl font-bold mb-4">Kegiatan Harian</h2>

<a href="{{ route('kegiatan.create') }}"
   class="btn btn-primary text-white px-4 py-2  bg-blue-600 hover:bg-blue-700 -white font-semibold rounded shadow">
    + Tambah Kegiatan
</a>

<table class="w-full mt-4 border">
    <thead class="bg-gray-200">
        <tr>
            <th class="border px-2 py-1">No</th>
            <th class="border px-2 py-1">Tanggal</th>
            <th class="border px-2 py-1">Jam</th>
            <th class="border px-2 py-1">Uraian</th>
            <th class="border px-2 py-1">Output</th>
            <th class="border px-2 py-1">Foto</th>
            {{-- <th class="border px-2 py-1">Aksi</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($kegiatans as $kegiatan)
        <tr>
            <td class="border px-2 py-1 text-center">{{ $loop->iteration }}</td>
            <td class="border px-2 py-1">{{ $kegiatan->tanggal }}</td>
            <td class="border px-2 py-1">
                {{ $kegiatan->jam_mulai }} - {{ $kegiatan->jam_selesai }}
            </td>
            <td class="border px-2 py-1">{{ $kegiatan->uraian }}</td>
            <td class="border px-2 py-1">{{ $kegiatan->output }}</td>
            <td class="border px-2 py-1 flex justify-center">
                <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="Foto kegiatan" style="width:100px;height:100px;object-fit:cover;">
            </td>
            
            {{-- <td class="border px-2 py-1 space-x-2">
                <a href="{{ route('kegiatan.show', $kegiatan->id) }}"
                   class="text-green-600">Detail</a><br>

                <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                   class="text-yellow btn btn-danger">Edit</a>

                <form method="POST"
                      action="{{ route('kegiatan.destroy', $kegiatan->id) }}"
                      class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 btn btn-primary"
                        onclick="return confirm('Yakin Hapus kegiatan?')">
                        Hapus
                    </button>
                </form>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

