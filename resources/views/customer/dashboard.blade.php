@extends('layouts.customer')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-green-600 to-emerald-700 rounded-2xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Selamat Datang, {{ $customer->name ?? 'Pelanggan' }}!</h1>
                <p class="text-green-100 mt-1">ID Pelanggan: {{ $customer->customer_id ?? 'N/A' }}</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-wifi text-6xl text-white/20"></i>
            </div>
        </div>
    </div>

    <!-- Status Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Connection Status -->
        <div class="bg-zinc-950 rounded-xl shadow-sm shadow-green-500/10 p-6 border border-green-500/20">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Status Koneksi</p>
                    <p class="text-2xl font-bold {{ ($customer->status ?? '') == 'active' ? 'text-green-600' : 'text-red-600' }}">
                        {{ ($customer->status ?? '') == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                    </p>
                </div>
                <div class="w-14 h-14 bg-{{ ($customer->status ?? '') == 'active' ? 'green' : 'red' }}-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-{{ ($customer->status ?? '') == 'active' ? 'check-circle' : 'times-circle' }} text-{{ ($customer->status ?? '') == 'active' ? 'green' : 'red' }}-600 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Package Info -->
        <div class="bg-zinc-950 rounded-xl shadow-sm shadow-green-500/10 p-6 border border-green-500/20">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Paket Aktif</p>
                    <p class="text-xl font-bold text-white">{{ $customer->package->name ?? 'N/A' }}</p>
                    <p class="text-green-600 text-sm">{{ $customer->package->speed ?? '' }}</p>
                </div>
                <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-box text-green-600 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Next Bill -->
        <div class="bg-zinc-950 rounded-xl shadow-sm shadow-green-500/10 p-6 border border-green-500/20">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Tagihan Berikutnya</p>
                    <p class="text-xl font-bold text-white">Rp {{ number_format($nextInvoice->total ?? 0, 0, ',', '.') }}</p>
                    <p class="text-orange-600 text-sm">Jatuh tempo: {{ isset($nextInvoice) ? $nextInvoice->due_date->format('d M Y') : '-' }}</p>
                </div>
                <div class="w-14 h-14 bg-orange-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-file-invoice-dollar text-orange-600 text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('customer.invoices') }}" class="bg-zinc-950 rounded-xl shadow-sm shadow-green-500/10 p-4 border border-green-500/20 hover:shadow-md transition text-center">
            <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-file-invoice text-emerald-600 text-xl"></i>
            </div>
            <p class="font-medium text-white">Tagihan</p>
        </a>
        <a href="{{ route('customer.payments') }}" class="bg-zinc-950 rounded-xl shadow-sm shadow-green-500/10 p-4 border border-green-500/20 hover:shadow-md transition text-center">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-credit-card text-green-600 text-xl"></i>
            </div>
            <p class="font-medium text-white">Pembayaran</p>
        </a>
        <a href="{{ route('customer.profile') }}" class="bg-zinc-950 rounded-xl shadow-sm shadow-green-500/10 p-4 border border-green-500/20 hover:shadow-md transition text-center">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-user-cog text-green-600 text-xl"></i>
            </div>
            <p class="font-medium text-white">Profil</p>
        </a>
        <a href="{{ route('customer.support') }}" class="bg-zinc-950 rounded-xl shadow-sm shadow-green-500/10 p-4 border border-green-500/20 hover:shadow-md transition text-center">
            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-headset text-red-600 text-xl"></i>
            </div>
            <p class="font-medium text-white">Bantuan</p>
        </a>
    </div>

    <!-- Recent Invoices -->
    <div class="bg-zinc-950 rounded-xl shadow-sm shadow-green-500/10 border border-green-500/20">
        <div class="p-6 border-b border-green-500/20">
            <h2 class="text-lg font-semibold text-white">Tagihan Terbaru</h2>
        </div>
        <div class="divide-y divide-green-500/10">
            @forelse($recentInvoices ?? [] as $invoice)
            <div class="p-4 flex items-center justify-between hover:bg-green-500/10">
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-zinc-900 rounded-full flex items-center justify-center">
                        <i class="fas fa-file-invoice text-gray-400"></i>
                    </div>
                    <div>
                        <p class="font-medium text-white">{{ $invoice->invoice_number }}</p>
                        <p class="text-sm text-gray-400">{{ $invoice->created_at->format('d M Y') }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-semibold text-white">Rp {{ number_format($invoice->total, 0, ',', '.') }}</p>
                    <span class="inline-flex px-2 py-1 text-xs rounded-full {{ $invoice->status == 'paid' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $invoice->status == 'paid' ? 'Lunas' : 'Belum Bayar' }}
                    </span>
                </div>
            </div>
            @empty
            <div class="p-8 text-center text-gray-400">
                <i class="fas fa-inbox text-4xl mb-2"></i>
                <p>Belum ada tagihan</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
