<!-- Top Bar -->
<div class="sticky top-0 z-40 shadow-lg" style="background:#060916;border-bottom:1px solid rgba(54,242,27,0.12);">
    <div class="flex items-center justify-between h-16 px-6">
        <!-- Mobile Menu Button -->
        <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-400 hover:text-green-400 transition">
            <i class="fas fa-bars text-xl"></i>
        </button>
        
        <!-- Page Title -->
        <div class="hidden lg:block">
            <h1 class="text-base font-semibold text-gray-200">
                @yield('page-title', 'Dashboard')
            </h1>
        </div>
        
        <!-- Right Side -->
        <div class="flex items-center space-x-4 ml-auto">
            <!-- Language Switcher -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-1 px-3 py-1.5 text-sm text-gray-400 hover:text-green-400 border rounded-lg transition" style="border-color:rgba(54,242,27,0.20);background:rgba(54,242,27,0.04);">
                    <i class="fas fa-globe"></i>
                    <span>{{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-32 rounded-lg shadow-lg z-50" style="background:#0c1220;border:1px solid rgba(54,242,27,0.20);">
                    <a href="{{ route('language.switch', 'en') }}" class="flex items-center px-4 py-2 text-sm hover:bg-green-500/10 transition {{ app()->getLocale() == 'en' ? 'text-green-400 font-medium' : 'text-gray-300' }}">
                        <span class="mr-2">🇺🇸</span> English
                    </a>
                    <a href="{{ route('language.switch', 'id') }}" class="flex items-center px-4 py-2 text-sm hover:bg-green-500/10 transition {{ app()->getLocale() == 'id' ? 'text-green-400 font-medium' : 'text-gray-300' }}">
                        <span class="mr-2">🇮🇩</span> Indonesia
                    </a>
                </div>
            </div>
            
            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-3 rounded-lg px-3 py-2 transition hover:bg-green-500/10">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-medium text-gray-200">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-green-400/70">Administrator</p>
                    </div>
                    <div class="h-9 w-9 rounded-full flex items-center justify-center text-white font-bold shadow" style="background:linear-gradient(135deg,#36f21b,#14b80f);">
                        <i class="fas fa-user-shield text-sm" style="color:#050b14;"></i>
                    </div>
                    <i class="fas fa-chevron-down text-xs text-gray-500 hidden sm:block"></i>
                </button>
                
                <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-56 rounded-lg shadow-lg z-50" style="background:#0c1220;border:1px solid rgba(54,242,27,0.20);">
                    <!-- User Info -->
                    <div class="px-4 py-3" style="border-bottom:1px solid rgba(54,242,27,0.12);">
                        <p class="text-sm font-medium text-gray-200">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                    </div>
                    
                    <div class="py-1">
                        <a href="{{ route('admin.change-password') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-green-500/10 hover:text-green-300 transition">
                            <i class="fas fa-key w-5 mr-3 text-gray-500"></i>
                            Ganti Password
                        </a>
                        <a href="{{ route('admin.settings') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-green-500/10 hover:text-green-300 transition">
                            <i class="fas fa-cog w-5 mr-3 text-gray-500"></i>
                            Settings
                        </a>
                    </div>
                    
                    <div class="py-1" style="border-top:1px solid rgba(54,242,27,0.12);">
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-400 hover:bg-red-500/10 transition">
                                <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
