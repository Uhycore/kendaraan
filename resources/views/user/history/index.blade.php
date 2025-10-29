<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">


    <style>
        body {
            background-color: #f7f8fa;
        }

        .container[role="main"] {
            padding-bottom: 100px !important;
        }

        .nav-yellow {
            background-color: #f3c94f;
            /* warna kuning khas PUPR */
            color: #fff;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .car-card {
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 1rem;
        }

        .car-image {
            width: 100%;
            border-radius: 15px 15px 0 0;
        }

        .price-tag {
            font-size: 1.1rem;
            font-weight: 600;
            color: #222;
        }

        .badge-info {
            background-color: #f7f7f7;
            color: #333;
            border: 1px solid #ddd;
            font-size: 0.75rem;
        }

        .reserve-btn {
            background-color: #333;
            color: white;
            border-radius: 10px;
            padding: 0.5rem 1.2rem;
            border: none;
            transition: 0.2s;
        }

        .reserve-btn:hover {
            background-color: #000;
        }

        /* floating bottom navbar */
        .bottom-nav {
            background: #fff;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 400px;
            z-index: 1000;
        }

        .bottom-nav a {
            flex: 1;
            text-align: center;
            padding: 8px 0;
            color: #666;
            text-decoration: none;
            font-size: 0.8rem;
        }

        .bottom-nav a.active {
            color: #FFC928;
        }

        .menu-item {
            transition: all 0.3s ease;
            background-color: #fff !important;
            border: none;
        }

        .menu-item.active {
            background-color: #364878 !important;
            /* Warna hitam untuk item aktif */
            color: #fff !important;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }

        .menu-item i {
            line-height: 1;
        }
    </style>

<body>
    @include('user.components.navbar')
    <h2 class="text-center fw-bold text-white mb-3 bg-warning py-2 " style="font-size: 1.8rem;">Riwayat Perjalanan Anda
    </h2>
    <div class="container py-4" role="main">


        @if ($trips->isEmpty())
            <div class="alert alert-warning text-center fs-5 py-3 rounded-3 shadow-sm">
                Belum ada riwayat perjalanan.
            </div>
        @endif

        @foreach ($trips as $trip)
            @php
                $start = \Carbon\Carbon::parse($trip->start)->translatedFormat('d F Y H:i');
                $end = \Carbon\Carbon::parse($trip->end)->translatedFormat('d F Y H:i');
                $car = $trip->car;
            @endphp

            <div class="card mb-3 shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="fw-semibold mb-2">{{ $trip->name ?? 'Perjalanan Tanpa Judul' }}</h4>
                        @php
                            switch ($trip->status) {
                                case 'berangkat':
                                    $badgeColor = 'bg-success'; // hijau
                                    break;
                                case 'kembali':
                                    $badgeColor = 'bg-warning text-dark'; // kuning
                                    break;
                                case 'batal':
                                    $badgeColor = 'bg-danger'; // merah
                                    break;
                                default:
                                    $badgeColor = 'bg-primary'; // biru default (terjadwal)
                                    break;
                            }
                        @endphp

                        <span class="badge {{ $badgeColor }} px-3 py-2" style="font-size: 0.85rem;">
                            {{ ucfirst($trip->status ?? 'Terjadwal') }}
                        </span>

                    </div>

                    <div class="mt-2" style="font-size: 1rem;">
                        <p class="mb-1"><strong>Tujuan:</strong> {{ $trip->travel_destination ?? '—' }}</p>
                        <p class="mb-1"><strong>Waktu:</strong> {{ $start }} — {{ $end }}</p>

                        @if ($car)
                            <p class="mb-1">
                                <strong>Kendaraan:</strong> {{ $car->brand }} {{ $car->model }}
                                ({{ $car->year ?? '—' }})
                                • {{ ucfirst($car->vehicle_type ?? '—') }}
                            </p>
                        @endif

                        @if (!empty($trip->notes))
                            <p class="mt-2 mb-0 text-muted"><i>"{{ $trip->notes }}"</i></p>
                        @endif
                    </div>

                    <div class="mt-3 d-flex flex-wrap gap-2">
                        <a data-bs-toggle="modal" data-bs-target="#statusUpdate{{ $trip['id'] }}"
                            class="btn btn-outline-secondary px-3" style="border-radius: 10px;">
                            Update Status
                        </a>
                        {{-- <button onclick="printTrip({{ $trip->id }})" class="btn btn-dark px-3"
                            style="border-radius: 10px;">
                            <i class="bi bi-printer"></i> Cetak
                        </button> --}}
                    </div>
                </div>
            </div>
            @include('user.history.modal', ['trip' => $trip])
        @endforeach
    </div>

    {{-- <script>
        function printTrip(id) {
            const url = '/user/trips/' + id + '/print';
            window.open(url, '_blank', 'noopener');
        }
    </script> --}}
    @include('user.components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
