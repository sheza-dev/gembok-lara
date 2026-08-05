@extends('layouts.app')

@section('title', 'Admin Login')

@push('styles')
@include('partials.shezanet-theme')
<style>
    .sn-bg {
        background: radial-gradient(ellipse at 60% 40%, #0a1a2e 0%, #050b14 60%, #060916 100%);
        position: relative;
        overflow: hidden;
    }
    .sn-bg::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            radial-gradient(circle at 15% 50%, rgba(54,242,27,0.07) 0%, transparent 50%),
            radial-gradient(circle at 85% 20%, rgba(54,242,27,0.05) 0%, transparent 45%);
        pointer-events: none;
    }
    .sn-card {
        background: rgba(6,9,22,0.92);
        border: 1px solid rgba(54,242,27,0.20);
        box-shadow: 0 0 40px rgba(54,242,27,0.08), 0 24px 48px rgba(0,0,0,0.6);
    }
    .sn-input {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(54,242,27,0.20);
        color: #fff;
        transition: border-color .2s, box-shadow .2s;
    }
    .sn-input::placeholder { color: #4a5568; }
    .sn-input:focus {
        outline: none;
        border-color: #36f21b;
        box-shadow: 0 0 0 3px rgba(54,242,27,0.12);
    }
    .sn-btn {
        background: linear-gradient(135deg, #36f21b 0%, #14b80f 100%);
        color: #050b14;
        font-weight: 700;
        transition: filter .2s, transform .15s;
    }
    .sn-btn:hover { filter: brightness(1.1); transform: translateY(-1px); }
    .sn-btn:active { transform: translateY(0); }
    .feature-icon { color: #36f21b; }
    .sn-logo-float { animation: snfloat 3.5s ease-in-out infinite; }
    @keyframes snfloat {
        0%,100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
</style>
@endpush

@section('content')
<div class="min-h-screen sn-bg flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl w-full grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

        <!-- Left Side – ShezaNet Branding -->
        <div class="hidden lg:flex flex-col space-y-8 text-white">
            <div class="flex items-center space-x-5 sn-logo-float">
                <img src="{{ asset('images/myshezanet-logo.svg') }}" alt="ShezaNet" class="h-20 w-auto">
            </div>
            <p class="text-green-400 text-lg font-medium -mt-4">ISP Management System</p>

            <div class="space-y-5 mt-6">
                <div class="flex items-start space-x-4">
                    <div class="h-11 w-11 rounded-lg flex items-center justify-center flex-shrink-0" style="background:rgba(54,242,27,0.10);">
                        <i class="fas fa-users feature-icon text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold mb-0.5">Customer Management</h3>
                        <p class="text-gray-400 text-sm">Kelola pelanggan, paket, dan invoice dengan mudah</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="h-11 w-11 rounded-lg flex items-center justify-center flex-shrink-0" style="background:rgba(54,242,27,0.10);">
                        <i class="fas fa-map-marked-alt feature-icon text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold mb-0.5">Network Monitoring</h3>
                        <p class="text-gray-400 text-sm">Monitor jaringan ODP dan infrastruktur real-time</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="h-11 w-11 rounded-lg flex items-center justify-center flex-shrink-0" style="background:rgba(54,242,27,0.10);">
                        <i class="fas fa-chart-line feature-icon text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold mb-0.5">Business Analytics</h3>
                        <p class="text-gray-400 text-sm">Laporan lengkap dan analisis bisnis mendalam</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side – Login Form -->
        <div class="w-full max-w-md mx-auto">
            <div class="sn-card rounded-2xl p-8 lg:p-10">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <img src="{{ asset('images/myshezanet-logo.svg') }}" alt="ShezaNet" class="h-12 mx-auto mb-4">
                    <p class="text-green-400 text-sm">ISP Management System</p>
                </div>

                <div class="mb-7">
                    <h2 class="text-2xl font-bold text-white mb-1">Admin Login</h2>
                    <p class="text-gray-400 text-sm">Masuk ke panel admin ShezaNet</p>
                </div>

                @if ($errors->any())
                <div class="mb-5 bg-red-500/10 border border-red-500/40 p-4 rounded-xl">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-400 mr-3"></i>
                        <p class="text-sm text-red-300">{{ $errors->first() }}</p>
                    </div>
                </div>
                @endif

                <form class="space-y-5" action="{{ route('admin.login.post') }}" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-1.5">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-green-500/60 text-sm"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                value="{{ old('email') }}"
                                class="sn-input block w-full pl-10 pr-4 py-3 rounded-xl text-sm"
                                placeholder="admin@example.com">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-1.5">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-green-500/60 text-sm"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="sn-input block w-full pl-10 pr-4 py-3 rounded-xl text-sm"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 rounded border-green-500/30 bg-transparent text-green-500 focus:ring-green-500 focus:ring-offset-0">
                        <label for="remember" class="ml-2 text-sm text-gray-400">Ingat saya 30 hari</label>
                    </div>

                    <button type="submit"
                        class="sn-btn w-full flex justify-center items-center py-3.5 px-4 rounded-xl text-sm shadow-lg shadow-green-900/30">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk ke Dashboard
                    </button>
                </form>

                <div class="mt-6 p-3.5 rounded-xl" style="background:rgba(54,242,27,0.05);border:1px solid rgba(54,242,27,0.15);">
                    <div class="flex items-center text-sm">
                        <i class="fas fa-info-circle text-green-400 mr-2 flex-shrink-0"></i>
                        <span class="text-gray-400"><strong class="text-gray-300">Default:</strong> admin@gembok.com / admin123</span>
                    </div>
                </div>
            </div>

            <div class="text-center mt-6 text-gray-500 text-xs">
                &copy; {{ date('Y') }} {{ companyName() }}. All rights reserved.
            </div>
        </div>
    </div>
</div>
@endsection
