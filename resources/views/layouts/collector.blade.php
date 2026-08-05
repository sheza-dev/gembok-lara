<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Collector Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @include('partials.shezanet-theme')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <style>
        body { background: #060916; }
        .sn-sidebar { background: #060916; border-right: 1px solid rgba(54,242,27,0.12); }
        .sn-topbar { background: #060916; border-bottom: 1px solid rgba(54,242,27,0.12); }
        .sn-nav-active { background: rgba(54,242,27,0.12); color: #4ade80; }
        .sn-nav-link:hover { background: rgba(54,242,27,0.07); color: #86efac; }
        .sn-stat { background: rgba(54,242,27,0.08); border: 1px solid rgba(54,242,27,0.18); }
    </style>
</head>
<body class="min-h-screen text-white" x-data="{ sidebarOpen: false }">
    <!-- Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/70 z-40 lg:hidden"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="sn-sidebar fixed top-0 left-0 z-50 w-64 h-screen transition-transform lg:translate-x-0">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16" style="border-bottom:1px solid rgba(54,242,27,0.12);">
            <img src="{{ asset('images/myshezanet-logo.svg') }}" alt="ShezaNet" class="h-9 w-auto">
        </div>

        <!-- Stats Card -->
        <div class="p-4">
            <div class="sn-stat rounded-xl p-4">
                <p class="text-green-400/70 text-xs mb-1">Terkumpul Hari Ini</p>
                <p class="text-2xl font-bold text-white">Rp {{ number_format($todayTotal ?? 0, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="px-3 space-y-1">
            <a href="{{ route('collector.dashboard') }}" class="sn-nav-link flex items-center px-4 py-2.5 rounded-lg transition text-gray-300 {{ request()->routeIs('collector.dashboard') ? 'sn-nav-active' : '' }}">
                <i class="fas fa-home w-5 mr-3"></i><span>Dashboard</span>
            </a>
            <a href="{{ route('collector.invoices') }}" class="sn-nav-link flex items-center px-4 py-2.5 rounded-lg transition text-gray-300 {{ request()->routeIs('collector.invoices*') ? 'sn-nav-active' : '' }}">
                <i class="fas fa-file-invoice-dollar w-5 mr-3"></i><span>Tagihan</span>
            </a>
            <a href="{{ route('collector.collect') }}" class="sn-nav-link flex items-center px-4 py-2.5 rounded-lg transition text-gray-300 {{ request()->routeIs('collector.collect*') ? 'sn-nav-active' : '' }}">
                <i class="fas fa-money-bill-wave w-5 mr-3"></i><span>Terima Pembayaran</span>
            </a>
            <a href="{{ route('collector.history') }}" class="sn-nav-link flex items-center px-4 py-2.5 rounded-lg transition text-gray-300 {{ request()->routeIs('collector.history*') ? 'sn-nav-active' : '' }}">
                <i class="fas fa-history w-5 mr-3"></i><span>Riwayat</span>
            </a>
            <a href="{{ route('collector.profile') }}" class="sn-nav-link flex items-center px-4 py-2.5 rounded-lg transition text-gray-300 {{ request()->routeIs('collector.profile*') ? 'sn-nav-active' : '' }}">
                <i class="fas fa-user-cog w-5 mr-3"></i><span>Profil</span>
            </a>
        </nav>

        <!-- Logout -->
        <div class="absolute bottom-0 left-0 right-0 p-4" style="border-top:1px solid rgba(54,242,27,0.12);">
            <form action="{{ route('collector.logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-2.5 text-gray-400 rounded-lg hover:bg-red-500/10 hover:text-red-400 transition text-sm">
                    <i class="fas fa-sign-out-alt w-5 mr-3"></i>Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Bar -->
        <header class="sn-topbar sticky top-0 z-30">
            <div class="flex items-center justify-between px-5 py-3.5">
                <button @click="sidebarOpen = true" class="lg:hidden text-gray-400 hover:text-green-400 transition">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex items-center space-x-3 ml-auto">
                    <span class="text-gray-300 text-sm">{{ Auth::user()->name ?? 'Collector' }}</span>
                    <div class="w-9 h-9 rounded-full flex items-center justify-center" style="background:linear-gradient(135deg,#36f21b,#14b80f);">
                        <i class="fas fa-user text-xs" style="color:#050b14;"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-4 lg:p-6">
            @if(session('success'))
                <div class="bg-green-500/10 border border-green-500/30 text-green-300 px-4 py-3 rounded-xl mb-5 text-sm">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-500/10 border border-red-500/30 text-red-300 px-4 py-3 rounded-xl mb-5 text-sm">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
