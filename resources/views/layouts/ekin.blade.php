<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>e-KIN PPNPN</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-blue-200 text-black">
        <div class="p-4 text-lg font-bold">
            <a href="{{ route('dashboard') }}">
                e-KIN PPNPN
            </a>
        </div>

        <nav class="mt-4">
            <a href="{{ route('kegiatan.index') }}"
               class="block px-4 py-2 hover:bg-blue-600">
                📋 Kegiatan Harian
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-2 hover:bg-blue-600">
                    🚪 Logout
                </button>
            </form>
        </nav>
    </aside>

    
    @if(session('success'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
        {{ session('success') }}
    </div>
    @endif

    <!-- KONTEN -->
    <main class="flex-1 p-6">
        <div class="bg-white rounded shadow p-6">
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>
