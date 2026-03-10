<x-app-layout>
    <x-slot name="header">
        Dashboard PPNPN
    </x-slot>

    <div class="p-6">
        Selamat datang, {{ auth()->user()->name }}
    </div>
</x-app-layout>
