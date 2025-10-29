<nav class="navbar navbar-dark" style="background-color: #364878;">
    <div class="container-fluid py-2 d-flex align-items-center justify-content-between">
        {{-- Kolom pencarian --}}
        <div class="flex-grow-1 me-3 position-relative">
            <h1 class="h4 text-white mb-0">Halo, {{ Auth::user()->name }}</h1>
        </div>
        {{-- Tombol Logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100 text-start">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </button>
        </form>

    </div>
</nav>
