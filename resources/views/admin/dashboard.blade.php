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


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    {{-- panggil sidebar fixed --}}
    @include('admin.layouts.sidebar')

    {{-- konten geser 64 (256px) saat lg --}}
    <div class="min-h-screen bg-gray-100 lg:pl-64">
        {{-- Top navbar kamu sendiri (opsional), ganti include sesuai milikmu --}}
        @include('admin.layouts.navbar')

        <header class="bg-white ">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
        </header>

        <main>
            <div class="p-3">
                <div class="max-w-7xl mx-auto ">
                    <div class="bg-white overflow-hidden  sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __("You're logged in!") }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
