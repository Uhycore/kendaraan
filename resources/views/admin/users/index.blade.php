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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">



    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pages/table.js'])
</head>

<body class="font-sans antialiased">

    {{-- Notifikasi --}}
    @if (session('success'))
        <x-toast bgColor="bg-green-600" title="Success">
            {{ session('success') }}
        </x-toast>
    @endif

    @if (session('failed'))
        <x-toast bgColor="bg-red-600" title="Failed">
            {{ session('failed') }}
        </x-toast>
    @endif

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    <div class="min-h-screen bg-gray-100 lg:pl-64">
        {{-- Navbar --}}
        @include('admin.layouts.navbar')

        <header class="bg-white">
            <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between gap-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Data Pengguna') }}
                    </h2>

                    {{-- <a href="{{ route('users.create') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-lg border border-gray-300 hover:bg-gray-50">
                        + Tambah User
                    </a> --}}
                </div>
            </div>
        </header>

        <main>
            <div class="p-3">
                <div class="max-w-7xl mx-auto">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                        <div class="p-4 sm:p-6">
                            <div class="overflow-x-auto">
                                <table id="table" class="min-w-full text-sm display">
                                    <thead class="bg-gray-50 text-gray-600">
                                        <tr>
                                            <th class="px-3 py-2 text-left">ID</th>
                                            <th class="px-3 py-2 text-left">Nama</th>
                                            <th class="px-3 py-2 text-left">Email</th>
                                            <th class="px-3 py-2 text-left">Role</th>
                                            <th class="px-3 py-2 text-left">Verifikasi Email</th>
                                            <th class="px-3 py-2 text-left">Dibuat Pada</th>
                                            <th class="px-3 py-2 text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @forelse ($users as $user)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-3 py-2 text-gray-500">{{ $user['id'] }}</td>
                                                <td class="px-3 py-2 font-medium text-gray-900">{{ $user['name'] }}</td>
                                                <td class="px-3 py-2 text-gray-700">{{ $user['email'] }}</td>
                                                <td class="px-3 py-2">
                                                    @php
                                                        $roleClass =
                                                            [
                                                                'admin' =>
                                                                    'bg-purple-50 text-purple-700 ring-purple-200',
                                                                'user' => 'bg-blue-50 text-blue-700 ring-blue-200',
                                                            ][$user['role']] ??
                                                            'bg-gray-50 text-gray-700 ring-gray-200';
                                                    @endphp
                                                    <span
                                                        class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium ring-1 {{ $roleClass }}">
                                                        {{ ucfirst($user['role']) }}
                                                    </span>
                                                </td>
                                                <td class="px-3 py-2">
                                                    @if ($user['email_verified_at'])
                                                        <span class="text-emerald-600">✔ Terverifikasi</span>
                                                    @else
                                                        <span class="text-rose-600">✖ Belum</span>
                                                    @endif
                                                </td>
                                                <td class="px-3 py-2 text-gray-600">
                                                    {{ \Carbon\Carbon::parse($user['created_at'])->format('Y M d') }}
                                                </td>
                                                <td class="px-3 py-2 text-right">
                                                    <button class="btn btn-outline-secondary btn-sm">View</button>
                                                    <button class="btn btn-outline-primary btn-sm ms-2">Edit</button>
                                                    <button class="btn btn-outline-danger btn-sm ms-2">Delete</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="px-3 py-8 text-center text-gray-500">
                                                    Belum ada data pengguna.
                                                </td>
                                            </tr> @endforelse
                                    </tbody>
                                </table>
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
