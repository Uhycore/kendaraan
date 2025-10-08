<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    {{-- panggil sidebar fixed --}}
    @include('admin.layouts.sidebar')

    {{-- konten geser 64 (256px) saat lg --}}
    <div class="min-h-screen bg-gray-100 lg:pl-64">
        {{-- Top navbar kamu sendiri (opsional), ganti include sesuai milikmu --}}
        @include('admin.layouts.navbar')

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between gap-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Kendaraan') }}
                    </h2>

                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-lg border border-gray-300 hover:bg-gray-50">
                        + Tambah
                    </a>
                </div>
            </div>
        </header>


        <main>
            <div class="p-3">
                <div class="max-w-7xl mx-auto">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                        <div class="p-4 sm:p-6">


                            @if (session('ok'))
                                <div
                                    class="mt-3 rounded-lg bg-emerald-50 text-emerald-700 px-3 py-2 text-sm border border-emerald-200">
                                    {{ session('ok') }}
                                </div>
                            @endif

                            <div class=" overflow-x-auto">
                                <table class="min-w-full text-sm">
                                    <thead class="bg-gray-50 text-gray-600">
                                        <tr>
                                            <th class="px-3 py-2 text-left">Brand</th>
                                            <th class="px-3 py-2 text-left">Model</th>
                                            <th class="px-3 py-2 text-left">Year</th>
                                            <th class="px-3 py-2 text-left">Color</th>
                                            <th class="px-3 py-2 text-right">Price</th>
                                            <th class="px-3 py-2 text-left">Plate</th>
                                            <th class="px-3 py-2 text-left">Transm.</th>
                                            <th class="px-3 py-2 text-left">Fuel</th>
                                            <th class="px-3 py-2 text-left">Status</th>
                                            <th class="px-3 py-2 text-left">Desc</th>
                                            <th class="px-3 py-2 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @forelse($cars as $car)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-3 py-2 font-medium text-gray-900">{{ $car->brand }}</td>
                                                <td class="px-3 py-2 text-gray-700">{{ $car->model }}</td>
                                                <td class="px-3 py-2">{{ $car->year }}</td>
                                                <td class="px-3 py-2">{{ $car->color }}</td>
                                                <td class="px-3 py-2 text-right">Rp
                                                    {{ number_format($car->price, 0, ',', '.') }}</td>
                                                <td class="px-3 py-2">{{ $car->plate_number }}</td>
                                                <td class="px-3 py-2 capitalize">{{ $car->transmission }}</td>
                                                <td class="px-3 py-2 capitalize">{{ $car->fuel_type }}</td>
                                                <td class="px-3 py-2">
                                                    @php
                                                        $badge =
                                                            [
                                                                'available' =>
                                                                    'bg-emerald-50 text-emerald-700 ring-emerald-200',
                                                                'sold' => 'bg-gray-100 text-gray-700 ring-gray-200',
                                                                'rented' => 'bg-blue-50 text-blue-700 ring-blue-200',
                                                                'maintenance' =>
                                                                    'bg-amber-50 text-amber-700 ring-amber-200',
                                                            ][$car->status] ?? 'bg-gray-50 text-gray-700 ring-gray-200';
                                                    @endphp
                                                    <span
                                                        class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium ring-1 {{ $badge }}">
                                                        {{ ucfirst($car->status) }}
                                                    </span>
                                                </td>
                                                <td class="px-3 py-2 text-gray-500">
                                                    {{ \Illuminate\Support\Str::limit($car->description, 40) }}
                                                </td>
                                                <td class="px-3 py-2 text-right whitespace-nowrap">
                                                    <a href="#"
                                                        class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium rounded-lg border border-gray-300 hover:bg-gray-50">
                                                        View
                                                    </a>
                                                    <a href="#"
                                                        class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium rounded-lg border border-indigo-300 text-indigo-700 hover:bg-indigo-50 ml-2">
                                                        Edit
                                                    </a>
                                                    <form action="#" method="POST" class="inline"
                                                        onsubmit="return confirm('Hapus data mobil ini?');">
                                                        @csrf @method('DELETE')
                                                        <button
                                                            class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium rounded-lg border border-rose-300 text-rose-700 hover:bg-rose-50 ml-2">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="11" class="px-3 py-8 text-center text-gray-500">
                                                    Belum ada data.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4">
                                {{ $cars->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
    
</body>

</html>
