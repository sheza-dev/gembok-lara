<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Portal - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    @include('partials.shezanet-theme')
</head>
<body class="min-h-screen flex items-center justify-center p-4" style="background:#060916;">
    <div class="w-full max-w-md">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <img src="/images/myshezanet-logo.svg" alt="ShezaNet" class="h-12 mx-auto mb-5">
            <h1 class="text-2xl font-bold text-white">Technician Portal</h1>
            <p class="text-green-400 mt-1 text-sm">Kelola tugas instalasi &amp; perbaikan</p>
        </div>

        <!-- Login Form -->
        <div class="sn-card rounded-2xl p-8">
            @if(session('error'))
                <div class="bg-red-500/10 border border-red-500/40 text-red-300 px-4 py-3 rounded-lg mb-6 text-sm">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                </div>
            @endif

            <form action="{{ route('technician.login.post') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block text-gray-300 text-sm font-medium mb-2">
                        <i class="fas fa-user mr-2 text-green-500/60"></i>Username
                    </label>
                    <input type="text" name="username" required
                        class="sn-input w-full px-4 py-3 rounded-xl text-sm"
                        placeholder="Masukkan username">
                </div>

                <div class="mb-5">
                    <label class="block text-gray-300 text-sm font-medium mb-2">
                        <i class="fas fa-lock mr-2 text-green-500/60"></i>Password
                    </label>
                    <input type="password" name="password" required
                        class="sn-input w-full px-4 py-3 rounded-xl text-sm"
                        placeholder="Masukkan password">
                </div>

                <div class="flex items-center mb-6">
                    <input type="checkbox" name="remember" id="remember" class="rounded text-green-500 focus:ring-green-500">
                    <label for="remember" class="ml-2 text-sm text-gray-400">Ingat saya</label>
                </div>

                <button type="submit" class="sn-btn w-full py-3.5 rounded-xl text-sm shadow-lg shadow-green-900/30 transition hover:brightness-110">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </button>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6">
            <a href="/" class="text-gray-500 hover:text-green-400 text-sm transition">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>
