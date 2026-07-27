<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Customer - {{ companyName() }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-black min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-zinc-950/95 border border-green-500/30 rounded-2xl shadow-2xl shadow-green-500/20 p-8">
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-wifi text-white text-3xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-white">MyShezanet Customer</h1>
                <p class="text-gray-300 mt-1">{{ companyName() }}</p>
            </div>

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('customer.login.post') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block text-gray-200 text-sm font-medium mb-2">
                        <i class="fas fa-user mr-2"></i>Username / No. HP / Email
                    </label>
                    <input type="text" name="username" value="{{ old('username') }}" required
                        class="w-full px-4 py-3 border border-green-500/30 bg-black/60 text-white placeholder-gray-500 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="Masukkan username PPPoE, HP, atau email">
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-200 text-sm font-medium mb-2">
                        <i class="fas fa-lock mr-2"></i>Password
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-3 border border-green-500/30 bg-black/60 text-white placeholder-gray-500 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="Masukkan password PPPoE">
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-300 hover:text-gray-200">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3 rounded-lg font-semibold hover:from-green-600 hover:to-emerald-700 transition transform hover:scale-[1.02]">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-300 text-sm">
                    Gunakan username dan password PPPoE Anda untuk login
                </p>
            </div>

            <div class="mt-6 pt-6 border-t border-green-500/20">
                <div class="flex justify-center space-x-4 text-sm">
                    <a href="{{ url('/') }}" class="text-green-400 hover:text-green-300">
                        <i class="fas fa-home mr-1"></i>Beranda
                    </a>
                    <a href="{{ route('voucher.buy') }}" class="text-green-400 hover:text-green-300">
                        <i class="fas fa-ticket mr-1"></i>Beli Voucher
                    </a>
                </div>
            </div>
        </div>

        <p class="text-center text-white/70 text-sm mt-6">
            &copy; {{ date('Y') }} {{ companyName() }} - MyShezanet
        </p>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
