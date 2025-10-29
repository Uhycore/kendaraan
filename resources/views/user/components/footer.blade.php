<footer class="footer-menu bg-light border-top fixed-bottom d-block d-md-none ">
    <div class="d-flex justify-content-around align-items-center py-2">
        <a href="{{ route('user.dashboard') }}" class="text-center text-decoration-none text-dark mb-2">
            <i class="bi bi-house-fill fs-1"></i><br>
            <small>Beranda</small>
        </a>

        <a href="{{ route('user.history') }}" class="text-center text-decoration-none text-dark mb-2">
            <i class="bi bi-clock-history fs-1"></i><br>
            <small>History</small>
        </a>

        {{-- <a href="#" class="text-center text-decoration-none text-dark position-relative mb-2">
            <i class="bi bi-bell-fill fs-1"></i><br>
            <small>Notifikasi</small>
        </a> --}}

        <a href="#" class="text-center text-decoration-none text-dark mb-2">
            <i class="bi bi-person-circle fs-1 "></i><br>
            <small>Profil</small>
        </a>
    </div>
</footer>
