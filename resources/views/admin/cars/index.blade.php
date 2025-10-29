<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">




    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pages/table.js'])
</head>

<body class="font-sans antialiased">
    {{-- Tampilkan semua error di atas form --}}
    

    @if (session('success'))
        <x-toast bgColor="bg-green-600"
        title="Success">
    {{ session('success') }}
    </x-toast>
    @endif

    @if (session('error'))
        <x-toast bgColor="bg-red-600" title="Failed">
            {{ session('failed') }}
        </x-toast>
    @endif

    




    {{-- panggil sidebar fixed --}}
    @include('admin.layouts.sidebar')

    {{-- konten geser 64 (256px) saat lg --}}
    <div class="min-h-screen
        bg-gray-100 lg:pl-64">
    {{-- Top navbar kamu sendiri (opsional), ganti include sesuai milikmu --}}
    @include('admin.layouts.navbar')

    <header class="bg-white ">
        <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between gap-3">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Kendaraan') }}
                </h2>

                <a 
                    class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-lg border border-gray-300 hover:bg-gray-50"
                    data-bs-toggle="modal" data-bs-target="#carCreate">
                    + Tambah
                </a>
            </div>
        </div>
    </header>


    <!-- ...head & header tetap... -->

    <main>
        <div class="p-3">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-4 sm:p-6">
                        <div class="overflow-x-auto">
                            @if ($errors->any())
                                <div class="mb-4 rounded-md bg-red-50 p-4 text-red-800">
                                    <div class="font-semibold">Terjadi error pada input kamu:</div>
                                    <ul class="mt-2 list-disc pl-5">
                                        @foreach ($errors->all() as $msg)
                                            <li>{{ $msg }}</li> @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{-- ID WAJIB untuk DataTables --}}
                            <table id="table"
        class="min-w-full text-sm display">
    <thead class="bg-gray-50 text-gray-600">
        <tr>
            <th class="px-3 py-2 text-left">NO</th>
            <th class="px-3 py-2 text-left">Merek</th>
            <th class="px-3 py-2 text-left">Model</th>
            <th class="px-3 py-2 text-left">Plat Nomor</th>
            <th class="px-3 py-2 text-left">1 Tahun Pajak</th>
            <th class="px-3 py-2 text-left">5 Tahun Pajak</th>
            <th class="px-3 py-2 text-left">Uji Kir</th>
            <th class="px-3 py-2 text-left">Keterangan</th>
            <th class="px-3 py-2 text-left">Status</th>
            <th class="px-3 py-2 text-right">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
        @forelse($cars as $car)
            <tr class="hover:bg-gray-50">
                {{-- ID --}}
                <td class="px-3 py-2 text-gray-500">{{ $loop->iteration }}</td>

                {{-- Merek --}}
                <td class="px-3 py-2 font-medium text-gray-900">{{ $car->brand }}</td>

                {{-- Model --}}
                <td class="px-3 py-2 text-gray-700">{{ $car->model }}</td>

                {{-- Plat Nomor --}}
                <td class="px-3 py-2 text-gray-700">{{ $car->plate_number }}</td>

                {{-- Masa Pajak 1 Tahun --}}
                <td class="px-3 py-2 text-gray-700">
                    @if ($car->masa_berlaku_pajak_1_tahun)
                        {{ \Carbon\Carbon::parse($car->masa_berlaku_pajak_1_tahun)->format('d M Y') }}
                    @else
                        <span class="text-gray-400">–</span>
                    @endif
                </td>

                {{-- Masa Pajak 5 Tahun --}}
                <td class="px-3 py-2 text-gray-700">
                    @if ($car->masa_berlaku_pajak_5_tahun)
                        {{ \Carbon\Carbon::parse($car->masa_berlaku_pajak_5_tahun)->format('d M Y') }}
                    @else
                        <span class="text-gray-400">–</span>
                    @endif
                </td>

                {{-- Uji KIR --}}
                <td class="px-3 py-2 text-gray-700">
                    @if ($car->uji_kir)
                        {{ \Carbon\Carbon::parse($car->uji_kir)->format('d M Y') }}
                    @else
                        <span class="text-gray-400">–</span>
                    @endif
                </td>

                {{-- Keterangan --}}
                <td class="px-3 py-2 text-gray-700">
                    {{ $car->keterangan ?? '—' }}
                </td>

                {{-- Status --}}
                <td class="px-3 py-2">
                    @php
                        $statusText =
                            [
                                'available' => 'Tersedia',
                                'rented' => 'Terpakai',
                                'maintenance' => 'Perawatan',
                                'sold' => 'Terjual',
                            ][$car->status] ?? ucfirst($car->status ?? '—');

                        $badgeClass =
                            [
                                'available' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                                'sold' => 'bg-gray-100 text-gray-700 ring-gray-200',
                                'rented' => 'bg-blue-50 text-blue-700 ring-blue-200',
                                'maintenance' => 'bg-amber-50 text-amber-700 ring-amber-200',
                            ][$car->status] ?? 'bg-gray-50 text-gray-700 ring-gray-200';
                    @endphp

                    <span
                        class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium ring-1 {{ $badgeClass }}">
                        {{ $statusText }}
                    </span>
                </td>

                {{-- Aksi --}}
                <td class="px-3 py-2 text-right whitespace-nowrap">
                    {{-- VIEW --}}
                    <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#carView{{ $car->id }}">
                        DETAIL
                    </button>

                    {{-- EDIT --}}
                    <button class="btn btn-outline-primary btn-sm ms-2" data-bs-toggle="modal"
                        data-bs-target="#carEdit{{ $car->id }}">
                        UPDATE
                    </button>

                    {{-- DELETE --}}
                    <button class="btn btn-outline-danger btn-sm ms-2" data-bs-toggle="modal"
                        data-bs-target="#carDelete{{ $car->id }}">
                        HAPUS
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="px-3 py-8 text-center text-gray-500">
                    Belum ada data kendaraan.
                </td>
            </tr>
        @endforelse
    </tbody>

    </table>
    @include('admin.cars.modal', ['cars' => $cars])

    </div>
    </div>
    </div>
    </div>
    </div>

    </main>


    </div>
    <script src="//unpkg.com/alpinejs" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
