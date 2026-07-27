<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - MyShezanet Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta property="og:image" content="{{ asset('images/myshezanet-screenshot.svg') }}">
    <meta name="theme-color" content="#050712">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/myshezanet-mark.svg') }}">
</head>
<body class="bg-black min-h-screen text-white" x-data="{ sidebarOpen: false }">
    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/70 z-40 lg:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 z-50 w-64 h-screen bg-gradient-to-b from-black via-zinc-950 to-green-950 transition-transform lg:translate-x-0">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16 border-b border-green-500/20">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/myshezanet-mark.svg') }}" alt="ShezaNet logo" class="w-10 h-10 rounded-lg">
                <span class="text-xl font-bold text-white">MyShezanet</span>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="p-4 space-y-2">
            <a href="{{ route('customer.dashboard') }}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-green-500/15 {{ request()->routeIs('customer.dashboard') ? 'bg-green-500/20 text-white border border-green-500/40' : '' }}">
                <i class="fas fa-home w-5 mr-3"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('customer.invoices') }}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-green-500/15 {{ request()->routeIs('customer.invoices*') ? 'bg-green-500/20 text-white border border-green-500/40' : '' }}">
                <i class="fas fa-file-invoice w-5 mr-3"></i>
                <span>Tagihan</span>
            </a>
            <a href="{{ route('customer.payments') }}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-green-500/15 {{ request()->routeIs('customer.payments*') ? 'bg-green-500/20 text-white border border-green-500/40' : '' }}">
                <i class="fas fa-credit-card w-5 mr-3"></i>
                <span>Pembayaran</span>
            </a>
            <a href="{{ route('customer.usage') }}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-green-500/15 {{ request()->routeIs('customer.usage*') ? 'bg-green-500/20 text-white border border-green-500/40' : '' }}">
                <i class="fas fa-chart-line w-5 mr-3"></i>
                <span>Pemakaian</span>
            </a>
            <a href="{{ route('customer.tickets') }}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-green-500/15 {{ request()->routeIs('customer.tickets*') ? 'bg-green-500/20 text-white border border-green-500/40' : '' }}">
                <i class="fas fa-ticket-alt w-5 mr-3"></i>
                <span>Tiket Saya</span>
            </a>
            <a href="{{ route('customer.profile') }}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-green-500/15 {{ request()->routeIs('customer.profile*') ? 'bg-green-500/20 text-white border border-green-500/40' : '' }}">
                <i class="fas fa-user-cog w-5 mr-3"></i>
                <span>Profil</span>
            </a>
            <a href="{{ route('customer.support') }}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-green-500/15 {{ request()->routeIs('customer.support*') ? 'bg-green-500/20 text-white border border-green-500/40' : '' }}">
                <i class="fas fa-headset w-5 mr-3"></i>
                <span>Bantuan</span>
            </a>
        </nav>

        <!-- Logout -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-green-500/20">
            <form action="{{ route('customer.logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-3 text-gray-300 rounded-lg hover:bg-red-600 hover:text-white transition">
                    <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Bar -->
        <header class="bg-black/90 backdrop-blur border-b border-green-500/20 sticky top-0 z-30">
            <div class="flex items-center justify-between px-4 py-3">
                <button @click="sidebarOpen = true" class="lg:hidden text-gray-300 hover:text-white">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex items-center space-x-4">
                    <span class="text-white">{{ $customer->name ?? 'Customer' }}</span>
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-green-600"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-4 lg:p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
