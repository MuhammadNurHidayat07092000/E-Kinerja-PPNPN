<!-- <form method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data">
    @csrf

    <input type="date" name="tanggal">
    <input type="text" name="uraian" placeholder="Uraian kegiatan">
    <input type="text" name="output" placeholder="Output">
    <input type="time" name="jam_mulai">
    <input type="time" name="jam_selesai">
    <div>
        <label>Foto Kegiatan</label>
        <input type="file" name="foto" accept="image/*">
    </div>

    <button type="submit">Simpan</button>
</form> -->

@extends('layouts.ekin')

@section('content')
<h2 class="text-xl font-bold mb-4">Tambah Kegiatan</h2>

<form method="POST" action="{{ route('kegiatan.store') }}"
      enctype="multipart/form-data"
      class="space-y-4">

@csrf

<input type="date" name="tanggal" class="w-full border rounded p-2">
<input type="text" name="uraian" placeholder="Uraian"
       class="w-full border rounded p-2">
<input type="text" name="output" placeholder="Output"
       class="w-full border rounded p-2">

<div class="flex gap-4">
    <label for="jam_mulai">Jam&nbsp;Mulai</label>
    <input type="time" name="jam_mulai" class="border rounded p-2 w-1/2">
    
    <label for="jam_selesai">Jam&nbsp;Selesai</label>
    <input type="time" name="jam_selesai" class="border rounded p-2 w-1/2">
</div>

<input type="file" name="foto" class="border p-2 w-full">

<button class="bg-blue-600 text-black px-4 py-2 rounded">
    Simpan
</button>
<div class="bg-yellow-600 mt-6">
        <a href="{{ route('kegiatan.index') }}"
           class="text-black px-4 py-2 rounded">
            ← Kembali
        </a>
    </div>

</form>
@endsection

