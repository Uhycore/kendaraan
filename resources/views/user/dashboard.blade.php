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

    <div class="container-fluid p-0">
        {{-- Navbar kuning --}}
        @include('user.components.navbar')

        {{-- Pilihan tanggal & kategori --}}
        <div class="bg-warning py-3 px-2 d-flex justify-content-around align-items-center" style="overflow-x:auto;">
            {{-- Motor --}}
            <button
                class="btn btn-light rounded-circle text-dark fw-semibold d-flex flex-column align-items-center justify-content-center menu-item active"
                style="width: 65px; height: 65px;">
                <i class="bi bi-bicycle fs-4"></i>
                <small>Motor</small>
            </button>

            {{-- Mobil --}}
            <button
                class="btn btn-light rounded-circle text-dark fw-semibold d-flex flex-column align-items-center justify-content-center menu-item"
                style="width: 65px; height: 65px;">
                <i class="bi bi-car-front-fill fs-4"></i>
                <small>Mobil</small>
            </button>

            {{-- Bus --}}
            <button
                class="btn btn-light rounded-circle text-dark fw-semibold d-flex flex-column align-items-center justify-content-center menu-item"
                style="width: 65px; height: 65px;">
                <i class="bi bi-bus-front fs-4"></i>
                <small>Bus</small>
            </button>
        </div>




        {{-- List mobil --}}
        <div class="container mt-3 mb-5 pb-5">
            <div class="car-card p-3">
                <img src="https://img.freepik.com/free-photo/red-sports-car-road_114579-5075.jpg" alt="Car"
                    class="car-image">
                <div class="d-flex justify-content-between mt-2">
                    <h6 class="fw-bold mb-0">McLaren 720S</h6>
                    <button class="btn btn-light btn-sm"><i class="bi bi-heart"></i></button>
                </div>
                <p class="text-muted mb-1">Hardtop Sport Car</p>

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="price-tag mb-0">¥8372 <span class="text-muted">/hari</span></p>
                        <p class="text-muted small mb-0">¥832 / jam</p>
                    </div>
                    <div>
                        <span class="badge badge-info me-2"><i class="bi bi-speedometer2"></i> 240HP</span>
                        <span class="badge badge-info"><i class="bi bi-gear-fill"></i> V12</span>
                    </div>
                </div>

                <div class="mt-3 text-end">
                    <button class="reserve-btn">Pesan <i class="bi bi-arrow-right-short"></i></button>
                </div>
            </div>
            <div class="car-card p-3">
                <img src="https://img.freepik.com/free-photo/red-sports-car-road_114579-5075.jpg" alt="Car"
                    class="car-image">
                <div class="d-flex justify-content-between mt-2">
                    <h6 class="fw-bold mb-0">McLaren 720S</h6>
                    <button class="btn btn-light btn-sm"><i class="bi bi-heart"></i></button>
                </div>
                <p class="text-muted mb-1">Hardtop Sport Car</p>

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="price-tag mb-0">¥8372 <span class="text-muted">/hari</span></p>
                        <p class="text-muted small mb-0">¥832 / jam</p>
                    </div>
                    <div>
                        <span class="badge badge-info me-2"><i class="bi bi-speedometer2"></i> 240HP</span>
                        <span class="badge badge-info"><i class="bi bi-gear-fill"></i> V12</span>
                    </div>
                </div>

                <div class="mt-3 text-end">
                    <button class="reserve-btn">Pesan <i class="bi bi-arrow-right-short"></i></button>
                </div>
            </div>
            <div class="car-card p-3">
                <img src="https://img.freepik.com/free-photo/red-sports-car-road_114579-5075.jpg" alt="Car"
                    class="car-image">
                <div class="d-flex justify-content-between mt-2">
                    <h6 class="fw-bold mb-0">McLaren 720S</h6>
                    <button class="btn btn-light btn-sm"><i class="bi bi-heart"></i></button>
                </div>
                <p class="text-muted mb-1">Hardtop Sport Car</p>

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="price-tag mb-0">¥8372 <span class="text-muted">/hari</span></p>
                        <p class="text-muted small mb-0">¥832 / jam</p>
                    </div>
                    <div>
                        <span class="badge badge-info me-2"><i class="bi bi-speedometer2"></i> 240HP</span>
                        <span class="badge badge-info"><i class="bi bi-gear-fill"></i> V12</span>
                    </div>
                </div>

                <div class="mt-3 text-end">
                    <button class="reserve-btn">Pesan <i class="bi bi-arrow-right-short"></i></button>
                </div>
            </div>
        </div>

        {{-- Bottom Navigation --}}
        @include('user.components.footer')
    </div>



</html>
