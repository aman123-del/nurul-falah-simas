<x-guest-layout>

    <div class="space-y-4 sm:space-y-6">
        <div class="text-center">
            <h3 class="text-xl sm:text-2xl font-black text-emerald-950 uppercase tracking-tighter">Selamat Datang</h3>
            <p class="text-[11px] sm:text-xs font-medium text-slate-500 mt-1 sm:mt-2">Silakan masuk untuk mengakses sistem manajemen.</p>
        </div>

        <x-auth-session-status class="mb-3 sm:mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-3.5 sm:space-y-5">
            @csrf

            <!-- Email Address -->
            <div class="space-y-1">
                <label for="email" class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Alamat Email</label>
                <div class="relative">
                    <x-text-input id="email" 
                        class="w-full !rounded-xl h-10 sm:h-12 border-2 {{ $errors->has('email') ? 'border-red-400' : 'border-slate-200' }} focus:border-emerald-500 focus:ring-0 transition-all text-xs sm:text-sm pl-3.5 sm:pl-4" 
                        type="email" name="email" :value="old('email')" required autofocus 
                        placeholder="nama@nurulfalah.com" />
                </div>
                @if($errors->has('email'))
                    <p class="mt-1 text-[9px] sm:text-[10px] font-bold text-red-500 uppercase tracking-widest ml-1">Kredensial ini tidak cocok dengan data kami.</p>
                @endif
            </div>

            <!-- Password -->
            <div class="space-y-1">
                <div class="flex justify-between items-center ml-1">
                    <label for="password" class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest">Kata Sandi</label>
                    @if (Route::has('password.request'))
                        <a class="text-[9px] sm:text-[10px] font-bold text-amber-600 hover:text-amber-700 uppercase tracking-widest" href="{{ route('password.request') }}">Lupa?</a>
                    @endif
                </div>
                <x-text-input id="password" 
                    class="w-full !rounded-xl h-10 sm:h-12 border-2 border-slate-200 focus:border-emerald-500 focus:ring-0 transition-all text-xs sm:text-sm pl-3.5 sm:pl-4" 
                    type="password" name="password" required placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-[9px] sm:text-[10px] font-bold uppercase" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center ml-1 pt-0.5">
                <input id="remember_me" type="checkbox" class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 transition" name="remember">
                <label for="remember_me" class="ms-2 text-[11px] sm:text-xs font-bold text-slate-500 cursor-pointer">Ingat Saya</label>
            </div>

            <button type="submit" class="btn-emerald w-full h-10 sm:h-12 !text-xs sm:!text-sm shadow-md sm:shadow-lg shadow-emerald-200">
                Masuk Sekarang
            </button>

            <!-- Separator -->
            <div class="relative flex items-center justify-center my-1 sm:my-2">
                <div class="absolute w-full border-t border-slate-100"></div>
                <div class="relative bg-white px-3 sm:px-4 text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest">Atau</div>
            </div>

            <!-- Login with Google -->
            <a href="{{ route('auth.google') }}" class="flex items-center justify-center gap-2.5 sm:gap-3 w-full h-10 sm:h-12 rounded-xl border-2 border-slate-200 bg-white hover:border-emerald-300 hover:bg-emerald-50/30 transition-all font-bold text-slate-600 text-xs sm:text-sm group">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 shrink-0" viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                <span>Masuk dengan Google</span>
            </a>

            @if (Route::has('register'))
                <div class="pt-3.5 sm:pt-5 text-center border-t border-slate-100">
                    <p class="text-[11px] sm:text-xs text-slate-500">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-emerald-600 hover:text-emerald-700 font-bold ml-1 underline decoration-2 underline-offset-4">Daftar Baru</a>
                    </p>
                </div>
            @endif
        </form>
    </div>
</x-guest-layout>
