<nav class="navbar navbar-dark" style="background-color: #364878;">
    <div class="container-fluid py-2 d-flex align-items-center justify-content-between">
        {{-- Kolom pencarian --}}
        <div class="flex-grow-1 me-3 position-relative">
            <h1 class="h4 text-white mb-0">Halo, {{ Auth::user()->name }}</h1>
        </div>
        {{-- Tombol Logout --}}
        <a href="{{ route('logout') }}" class="text-white fs-5">
            <i class="bi bi-box-arrow-right fs-1"></i>
        </a>
    </div>
</nav>
