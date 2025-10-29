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

    <div class="container-fluid p-0">

        {{-- Navbar kuning --}}
        @include('user.components.navbar')

        {{-- Pilihan kategori --}}
        <div class="bg-warning py-3 px-2 d-flex justify-content-around align-items-center" style="overflow-x:auto;">
            {{-- Motor --}}
            <button
                class="btn btn-light rounded-circle text-dark fw-semibold d-flex flex-column align-items-center justify-content-center menu-item active"
                data-type="motor" aria-pressed="true" style="width: 65px; height: 65px;">
                <i class="bi bi-bicycle fs-4"></i>
                <small>Motor</small>
            </button>

            {{-- Mobil --}}
            <button
                class="btn btn-light rounded-circle text-dark fw-semibold d-flex flex-column align-items-center justify-content-center menu-item"
                data-type="mobil" aria-pressed="false" style="width: 65px; height: 65px;">
                <i class="bi bi-car-front-fill fs-4"></i>
                <small>Mobil</small>
            </button>

            {{-- Bus --}}
            <button
                class="btn btn-light rounded-circle text-dark fw-semibold d-flex flex-column align-items-center justify-content-center menu-item"
                data-type="bus" aria-pressed="false" style="width: 65px; height: 65px;">
                <i class="bi bi-bus-front fs-4"></i>
                <small>Bus</small>
            </button>
        </div>


        {{-- List mobil (dinamis, tanpa status & tombol selalu aktif) --}}
        <div class="container mt-3 mb-5 pb-5">
            @forelse ($cars as $car)
                @php
                    $imgUrl = $car['image']
                        ? asset('storage/cars/' . $car['image'])
                        : 'https://placehold.co/800x450?text=Foto+Belum+Tersedia';

                    $priceDaily = number_format((float) $car['price'], 0, ',', '.');

                    // data-type untuk filter tab
                    $type = strtolower($car['vehicle_type'] ?? '');
                    $subtitle =
                        trim(
                            ($car['vehicle_type'] ? ucfirst($car['vehicle_type']) : '') . ' • ' . ($car['year'] ?? ''),
                        ) ?:
                        '—';
                @endphp

                <div class="car-card p-3" data-type="{{ $type }}">
                    <div class="position-relative">
                        <img src="{{ $imgUrl }}" alt="Foto {{ $car['brand'] }} {{ $car['model'] }}"
                            class="car-image" loading="lazy">
                        {{-- STATUS DIHILANGKAN: tidak ada badge di sudut gambar --}}
                    </div>

                    <div class="d-flex justify-content-between align-items-start mt-2">
                        <div>
                            <h5 class="fw-semibold mb-1">{{ $car['brand'] }} {{ $car['model'] }}</h5>
                            <div class="text-muted">
                                <i class="bi bi-tags"></i>
                                Rp {{ $priceDaily }} <span class="text-secondary">/ unit</span>
                            </div>
                        </div>
                        {{-- tombol love dihapus --}}
                    </div>

                    <div class="text-muted small mt-1">{{ $subtitle }}</div>

                    <div class="d-flex flex-wrap gap-2 mt-2">
                        <span class="badge badge-info">
                            <i class="bi bi-gear-fill me-1"></i>{{ ucfirst($car['transmission']) }}
                        </span>
                        <span class="badge badge-info">
                            <i class="bi bi-fuel-pump-diesel-fill me-1"></i>{{ ucfirst($car['fuel_type']) }}
                        </span>
                        @if (!empty($car['plate_number']))
                            <span class="badge badge-info">
                                <i class="bi bi-hash me-1"></i>{{ $car['plate_number'] }}
                            </span>
                        @endif
                        @if (!empty($car['color']))
                            <span class="badge badge-info">
                                <i class="bi bi-palette me-1"></i>{{ ucfirst($car['color']) }}
                            </span>
                        @endif
                    </div>

                    @if (!empty($car['description']))
                        <p class="mt-2 mb-0 text-body">{{ $car['description'] }}</p>
                    @endif

                    <div class="mt-3 d-flex justify-content-end">
                        <button class="reserve-btn" title="Pesan kendaraan ini" data-bs-toggle="modal"
                            data-bs-target="#tripCreate{{ $car['id'] }}">
                            Pesan <i class="bi
                            bi-arrow-right-short"></i>
                        </button>
                    </div>
                </div>
                @include('user.trips.modal', ['car' => $car])
            @empty
                <div class="alert alert-warning">Belum ada data kendaraan.</div>
            @endforelse
        </div>


        {{-- Bottom Navigation --}}
        @include('user.components.footer')


</body>
<script>
    (function() {
        const buttons = document.querySelectorAll('.menu-item');
        const cards = document.querySelectorAll('.car-card');

        function setActive(btn) {
            buttons.forEach(b => {
                b.classList.toggle('active', b === btn);
                b.setAttribute('aria-pressed', b === btn ? 'true' : 'false');
            });
        }

        function filter(type) {
            const t = (type || '').toLowerCase();
            cards.forEach(card => {
                const ctype = (card.dataset.type || '').toLowerCase();
                card.style.display = (ctype === t) ? '' : 'none';
            });
        }

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                setActive(btn);
                filter(btn.dataset.type || '');
            });
        });

        // set default filter sesuai tombol yang sudah active di markup (motor)
        const activeBtn = document.querySelector('.menu-item.active');
        if (activeBtn) filter(activeBtn.dataset.type || '');
    })();
</script>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: "{{ session('error') }}",
            showConfirmButton: true
        });
    @endif

    @if ($errors->any())
        Swal.fire({
            icon: 'warning',
            title: 'Input Tidak Valid',
            html: `
                <ul style="text-align: left; margin-top: 10px;">
                    @foreach ($errors->all() as $msg)
                        <li>{{ $msg }}</li>
                    @endforeach
                </ul>
            `,
            confirmButtonText: 'Perbaiki',
        });
    @endif
</script>
<script>
    setTimeout(() => {
        document.querySelectorAll('x-toast').forEach(el => el.remove());
    }, 4000);
</script>





</html>
