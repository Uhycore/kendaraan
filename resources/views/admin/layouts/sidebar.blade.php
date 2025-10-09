{{-- resources/views/admin/layouts/sidebar.blade.php --}}
<aside class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-gray-200 hidden lg:flex lg:flex-col">
    {{-- Brand / Logo --}}
    <div class="h-16 flex items-center px-5 border-b">
        <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold tracking-tight">
            {{ config('app.name', 'Dashboard') }}
        </a>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto py-5">
        {{-- text-base → md:text-lg biar naik ukuran di layar sedang ke atas --}}
        <ul class="space-y-1 px-4 text-base md:text-base">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg
                   {{ request()->routeIs('admin.dashboard')
                       ? 'bg-gray-100 text-gray-900 font-semibold'
                       : 'text-gray-700 hover:bg-gray-50' }}">
                    {{-- ikon sedikit lebih besar --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path d="M12 3l9 7-1.5 2L18 10.9V20h-5v-5H11v5H6v-9.1L4.5 12 3 10l9-7z" />
                    </svg>
                    <span class="truncate">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('cars.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg
                   {{ request()->routeIs('cars.index') ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h10v2H4v-2z" />
                    </svg>
                    <span class="truncate">Kendaraan</span>
                </a>
            </li>
        </ul>
    </nav>

    {{-- Footer / Logout (opsional) --}}
    {{-- ... --}}
</aside>
