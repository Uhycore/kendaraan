{{-- resources/views/admin/layouts/sidebar.blade.php --}}
<aside
    class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-gray-200 hidden lg:flex lg:flex-col">
    {{-- Brand / Logo --}}
    <div class="h-16 flex items-center px-4 border-b">
        <a href="{{ route('admin.dashboard') }}" class="text-lg font-semibold tracking-tight">
            {{ config('app.name', 'Dashboard') }}
        </a>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-1 px-3 text-sm">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-md
                   {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-gray-900 font-medium' : 'text-gray-700 hover:bg-gray-50' }}">
                    {{-- icon sederhana --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 3l9 7-1.5 2L18 10.9V20h-5v-5H11v5H6v-9.1L4.5 12 3 10l9-7z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center gap-2 px-3 py-2 rounded-md
                   {{ request()->routeIs('posts.*') ? 'bg-gray-100 text-gray-900 font-medium' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h10v2H4v-2z"/>
                    </svg>
                    <span>Kendaraan</span>
                </a>
            </li>

            
        </ul>
    </nav>

    {{-- Footer / Logout
    <div class="p-3 border-t">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full inline-flex items-center justify-center px-3 py-2 rounded-md text-sm
                           text-gray-700 hover:bg-gray-50">
                Logout
            </button>
        </form>
    </div> --}}
</aside>
