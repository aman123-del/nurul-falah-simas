<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>e-Santri - Ponpes Nurul Falah Berbaur</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|amiri:400,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; overflow-x: hidden; }
            .font-arabic { font-family: 'Amiri', serif; }
            .hero-glow-gold {
                background: radial-gradient(circle at 50% 50%, rgba(251, 191, 36, 0.08) 0%, transparent 70%);
            }
        </style>
    </head>
    <body class="antialiased bg-slate-50 text-slate-900 bg-dot-pattern min-h-screen selection:bg-emerald-100 selection:text-emerald-900">
        
        <!-- Decorative Glows -->
        <div class="fixed top-0 left-0 w-full h-full pointer-events-none z-0">
            <div class="absolute -top-[10%] -left-[10%] w-[50%] h-[50%] bg-emerald-200/20 blur-[120px] rounded-full"></div>
            <div class="absolute top-[40%] -right-[10%] w-[40%] h-[40%] bg-teal-200/20 blur-[120px] rounded-full"></div>
        </div>

        <!-- Navigation -->
        <header class="fixed top-0 left-0 right-0 z-50 bg-white/70 backdrop-blur-xl border-b border-emerald-50 shadow-sm transition-all duration-300">
            <nav class="max-w-7xl mx-auto px-8 h-24 flex items-center justify-between">
                <!-- Bagian Kiri: Logo -->
                <div class="flex flex-1 items-center justify-start">
                    <a href="/" class="flex items-center space-x-4 group">
                        <x-application-logo class="h-20 w-auto drop-shadow-xl transition-transform duration-300 group-hover:scale-105" />
                        <div class="hidden sm:flex flex-col justify-center mt-1">
                            <h1 class="font-black text-3xl tracking-tighter text-emerald-950 uppercase leading-none">e-Santri</h1>
                            <p class="text-[10px] font-black text-amber-600 uppercase tracking-[0.2em] mt-1 ml-0.5">Nurul Falah Berbaur</p>
                        </div>
                    </a>
                </div>
                
                <!-- Bagian Tengah: Menu -->
                <div class="hidden lg:flex items-center justify-center relative">
                    <div id="nav-menu" class="flex items-center space-x-8 relative">
                        <a href="#home" class="nav-link text-[11px] font-black uppercase tracking-widest hover:text-amber-500 transition py-1 text-emerald-950" data-section="home">Beranda</a>
                        <a href="#profile" class="nav-link text-[11px] font-black uppercase tracking-widest hover:text-amber-500 transition py-1 text-slate-500" data-section="profile">Profil</a>
                        <a href="#program" class="nav-link text-[11px] font-black uppercase tracking-widest hover:text-amber-500 transition py-1 text-slate-500" data-section="program">Program</a>
                        <a href="#berita" class="nav-link text-[11px] font-black uppercase tracking-widest hover:text-amber-500 transition py-1 text-slate-500" data-section="berita">Berita</a>
                        <a href="#dokumentasi" class="nav-link text-[11px] font-black uppercase tracking-widest hover:text-amber-500 transition py-1 text-slate-500" data-section="dokumentasi">Dokumentasi</a>
                        <a href="#kontak" class="nav-link text-[11px] font-black uppercase tracking-widest hover:text-amber-500 transition py-1 text-slate-500" data-section="kontak">Kontak</a>
                        
                        <!-- Sliding Underline -->
                        <div id="nav-underline" class="absolute bottom-0 h-0.5 bg-emerald-950 transition-all duration-300 ease-out"></div>
                    </div>
                </div>

                <!-- Bagian Kanan: Tombol Login -->
                <div class="flex flex-1 items-center justify-end">
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <div class="flex items-center space-x-6">
                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <button type="submit" class="text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-red-500 transition-colors duration-300 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4-4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                            Keluar
                                        </button>
                                    </form>
                                    <a href="{{ url('/dashboard') }}" class="btn-emerald h-12 !px-6 !text-[10px] shadow-emerald-100 uppercase">Login</a>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="btn-gold h-12 !px-8 !text-[10px] shadow-amber-100 italic uppercase">
                                    Login
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <main id="home" class="relative z-10 max-w-7xl mx-auto px-8 pt-44 pb-32">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                
                <!-- Left Content -->
                <div class="lg:col-span-7 space-y-10 text-center lg:text-left">
                    <div class="inline-flex items-center space-x-3 px-4 py-2 bg-amber-50 rounded-2xl shadow-sm border border-amber-100 self-start">
                        <span class="relative flex h-3 w-3">
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
                        </span>
                        <span class="text-[10px] font-black text-amber-900 uppercase tracking-widest">Platform Terintegrasi v2.0</span>
                    </div>

                    <h1 class="text-6xl md:text-8xl font-black text-emerald-950 leading-[0.9] tracking-tighter">
                        e-Santri <br>
                        <span class="text-gradient-gold text-4xl md:text-6xl font-arabic font-bold py-4 block leading-normal">المعهد الإسلامي نور الفلاح برباور</span>
                    </h1>
                    
                    <p class="text-xl text-slate-500 max-w-2xl leading-relaxed font-medium">
                        Sistem Informasi Pesantren berbasis web Pondok Pesantren Nurul Falah Berbaur
                    </p>

                    <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 justify-center lg:justify-start">
                        <a href="{{ route('login') }}" class="btn-gold h-16 !px-12 !text-base shadow-2xl shadow-amber-200 uppercase">
                            Login
                        </a>
                        <a href="#features" class="h-16 flex items-center px-10 rounded-2xl border-2 border-emerald-900/10 text-emerald-900 font-black uppercase text-xs tracking-widest hover:bg-white hover:border-emerald-600 transition duration-300">
                            Eksplorasi Fitur
                        </a>
                    </div>


                </div>

                <!-- Right Content: The Hero Photo Gallery -->
                <div class="lg:col-span-5 relative h-[600px] lg:h-auto">
                    <!-- Main Large Photo -->
                    <div class="relative z-20">
                        <div class="absolute -inset-10 bg-amber-400/10 blur-[100px] rounded-full"></div>
                        <img src="{{ asset('images/hero_1.png') }}" alt="Santri Nurul Falah" class="w-full h-auto relative z-20 drop-shadow-[0_20px_50px_rgba(4,120,87,0.5)] rounded-[4.5rem] border-8 border-white object-cover aspect-[4/3]">
                    </div>
                    
                    <!-- Secondary Photo 1 (Top Right) -->
                    <div class="absolute -top-16 -right-16 w-80 h-auto z-30">
                        <img src="{{ asset('images/hero_3.png') }}" alt="Kegiatan Santri" class="w-full h-full rounded-[3.5rem] border-4 border-white shadow-2xl object-cover aspect-square">
                    </div>

                    <!-- Secondary Photo 2 (Bottom Right) -->
                    <div class="absolute -bottom-20 -right-8 w-72 h-auto z-10">
                        <img src="{{ asset('images/hero_2.png') }}" alt="Barisan Santri" class="w-full h-full rounded-[3.5rem] border-4 border-white shadow-2xl object-cover aspect-square">
                    </div>

                </div>

            </div>
        </main>

        <!-- Dynamic Wave Divider -->
        <div class="relative z-10 w-full h-32 bg-slate-50">
            <svg class="absolute bottom-0 w-full h-full text-white fill-current" preserveAspectRatio="none" viewBox="0 0 1440 320">
                <path d="M0,192L48,197.3C96,203,192,213,288,192C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>

        <!-- Section: Profil Pondok -->
        <section id="profile" class="bg-white py-32 relative z-10">
            <div class="max-w-7xl mx-auto px-8">
                
                <div class="text-center mb-20">
                    <p class="text-emerald-600 font-black uppercase tracking-[0.3em] text-[10px] mb-4">Profil Pondok</p>
                    <h2 class="text-4xl md:text-5xl font-black text-emerald-950 tracking-tighter italic">
                        Mengenal Lebih Dekat
                    </h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <!-- Left: Description -->
                    <div class="space-y-8">
                        <div class="flex items-start space-x-4">
                            <span class="w-12 h-[2px] bg-amber-500 mt-6 shrink-0"></span>
                            <div>
                                <h3 class="text-2xl font-bold text-emerald-900 mb-4">Sejarah Singkat</h3>
                                <p class="text-slate-500 leading-relaxed text-justify">
                                    Ponpes Nurul Falah Berbaur Didirikan Sekitar Tahun Oleh Al Maghfurlah KH. Muhammad Fatnan Bin Matori. Pada Awal Nya Pondok Pesantren Ini Bernama PP. Nurul Falah Dan Kemudian Di Tahun 2014, Ditambah Nama Menjadi PP. Nurul Falah BERBAUR Atas Bimbingan Dari Guru Besar KH. Suadi Abu Amar Yang Merupakan Guru Spiritual Dari Putra Dan Putri Alm. KH. Muhammad Fatnan.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <span class="w-12 h-[2px] bg-emerald-500 mt-6 shrink-0"></span>
                            <div>
                                <h3 class="text-2xl font-bold text-emerald-900 mb-4">Perkembangan Unit</h3>
                                <p class="text-slate-500 leading-relaxed text-justify">
                                    Disamping Penambahan Nama, PP. Nurul Falah Berbaur Juga Mengembangkan Unit Baru, Yaitu Madrasah Formal Berupa Mts BERBAUR Dan MA BERBAUR. Pada Awal Berdirinya, Alhamdulillah Mts Dan MA BERBAUR Angkatan Pertama Dapat Menerima Santri Baru Sejumlah 40 Untuk Mts Dan 50 Santri Untuk MA. Dan Pada Angkatan Kedua Mencapai 85 Santri Mts Dan 45 Santri MA BERBAUR. Ditambah 40 Santri Salaf (Tidak Sekolah). Sehingga Jumlah Keseluruhan Santri Saat Ini Mencapai 909 Anak.
                                </p>
                            </div>
                        </div>


                    </div>

                    <!-- Right: Visi Misi Cards -->
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Visi Card -->
                        <div class="bg-emerald-50 rounded-3xl p-8 border border-emerald-100 relative overflow-hidden group hover:shadow-lg transition duration-300">
                             <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition">
                                <svg class="w-24 h-24 text-emerald-900" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 3.99L19.53 19H4.47L12 5.99zM11 16h2v2h-2zm0-6h2v4h-2z"/></svg>
                             </div>
                            <h4 class="text-xl font-black text-emerald-950 mb-4 uppercase tracking-widest flex items-center">
                                <span class="w-2 h-8 bg-amber-500 mr-3 rounded-full"></span> Visi
                            </h4>
                            <p class="text-emerald-800 font-medium italic relative z-10">
                                "Islami, berilmu, terampil dan berkualitas"
                            </p>
                        </div>

                        <!-- Misi Card -->
                         <div class="bg-white rounded-3xl p-8 border-2 border-slate-100 relative overflow-hidden group hover:border-amber-200 hover:shadow-lg transition duration-300">
                            <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition">
                                <svg class="w-24 h-24 text-amber-600" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                            </div>
                            <h4 class="text-xl font-black text-emerald-950 mb-4 uppercase tracking-widest flex items-center">
                                <span class="w-2 h-8 bg-emerald-500 mr-3 rounded-full"></span> Misi
                            </h4>
                            <ul class="space-y-4 relative z-10">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-500 mr-2 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-slate-600 font-medium text-sm text-justify">Mengupayakan terciptanya Lingkungan Madrasah yang Islami</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-500 mr-2 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-slate-600 font-medium text-sm text-justify">Menanamkan kesadaran untuk mengamalkan nilai-nilai islam Nusantran dalam Wadah jam’iyah Nahdlatul ‘Ulama ala Ahusunnah Walja’ah</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-500 mr-2 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-slate-600 font-medium text-sm text-justify">Mengoptimalkan Proses Belajar Mengajar, melibatkan seluruh Komponen, sehingga mampu memberikan kesempatan kepada seluruh peserta didik untuk mengoptimalkan potensi yang dimilikinya</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-500 mr-2 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-slate-600 font-medium text-sm text-justify">Mengupayakan pendalaman Materi Agama Islam melalui program terpadu dengan kurikulum pondok pesantren</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-500 mr-2 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-slate-600 font-medium text-sm text-justify">Meningkatkan dan mengembangkan Program Ketrampilan yang sesuai dengan perkembangan dunia usaha</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-500 mr-2 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-slate-600 font-medium text-sm text-justify">Mengembangkan bakat dan potensi peserta didik dengan berbagai kegiatan Ekstrakurikuler</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>



        <!-- Section: Program Unggulan -->
        <section id="program" class="py-32 relative z-10 bg-slate-50">
            <!-- Background Decorations -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                 <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-emerald-100/40 rounded-full blur-[120px] -z-10"></div>
            </div>

            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center mb-20">
                    <p class="text-emerald-600 font-black uppercase tracking-[0.3em] text-[10px] mb-4">Pendidikan & Pengajaran</p>
                    <h2 class="text-4xl md:text-5xl font-black text-emerald-950 tracking-tighter italic">
                        Program Unggulan
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Program 1: Pendidikan Formal -->
                    <div class="group relative bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100 hover:shadow-2xl hover:shadow-emerald-900/5 hover:-translate-y-2 transition-all duration-300">
                        <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                            <svg class="w-7 h-7 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-emerald-950 mb-4">Pendidikan Formal</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center text-xs font-bold text-emerald-800">
                                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-2"></span> RA BERBAUR
                            </li>
                            <li class="flex items-center text-xs font-bold text-emerald-800">
                                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-2"></span> MTs BERBAUR
                            </li>
                            <li class="flex items-center text-xs font-bold text-emerald-800">
                                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-2"></span> MA BERBAUR
                            </li>
                            <li class="flex items-center text-xs font-bold text-emerald-800 text-left">
                                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-2 shrink-0"></span> BLKK NURUL FALAH
                            </li>
                        </ul>
                    </div>

                    <!-- Program 2: Program Pesantren -->
                    <div class="group relative bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100 hover:shadow-2xl hover:shadow-emerald-900/5 hover:-translate-y-2 transition-all duration-300">
                        <div class="w-14 h-14 bg-amber-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                            <svg class="w-7 h-7 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-emerald-950 mb-4">Program Pesantren</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center text-xs font-bold text-emerald-800 text-left">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-2 shrink-0"></span> Tahfidz, Tartil, Tilawah
                            </li>
                            <li class="flex items-center text-xs font-bold text-emerald-800">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-2"></span> Kajian Kitab Kuning
                            </li>
                            <li class="flex items-center text-xs font-bold text-emerald-800">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-2"></span> Kesenian Rebana
                            </li>
                        </ul>
                    </div>

                    <!-- Program 3: Program Ketrampilan -->
                    <div class="group relative bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100 hover:shadow-2xl hover:shadow-emerald-900/5 hover:-translate-y-2 transition-all duration-300">
                        <div class="w-14 h-14 bg-teal-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                            <svg class="w-7 h-7 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-emerald-950 mb-4">Program Ketrampilan</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center text-xs font-bold text-emerald-800 text-left">
                                <span class="w-1.5 h-1.5 bg-teal-500 rounded-full mr-2 shrink-0"></span> Pertanian & Peternakan
                            </li>
                            <li class="flex items-center text-xs font-bold text-emerald-800">
                                <span class="w-1.5 h-1.5 bg-teal-500 rounded-full mr-2"></span> Pertukangan
                            </li>
                        </ul>
                    </div>

                    <!-- Program 4: Unit Usaha -->
                    <div class="group relative bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100 hover:shadow-2xl hover:shadow-emerald-900/5 hover:-translate-y-2 transition-all duration-300">
                        <div class="w-14 h-14 bg-rose-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                            <svg class="w-7 h-7 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-emerald-950 mb-4">Unit Usaha</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center text-xs font-bold text-emerald-800 text-left">
                                <span class="w-1.5 h-1.5 bg-rose-500 rounded-full mr-2 shrink-0"></span> Berbaur Farm
                            </li>
                            <li class="flex items-center text-xs font-bold text-emerald-800">
                                <span class="w-1.5 h-1.5 bg-rose-500 rounded-full mr-2"></span> Percetakan Pegasus Art
                            </li>
                            <li class="flex items-center text-xs font-bold text-emerald-800">
                                <span class="w-1.5 h-1.5 bg-rose-500 rounded-full mr-2"></span> Kopontren Berbaur
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>

        <!-- Section: Berita Terkini -->
        <section id="berita" class="py-32 relative z-10 bg-white">
            <div class="max-w-7xl mx-auto px-8">
                <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                    <div>
                        <p class="text-emerald-600 font-black uppercase tracking-[0.3em] text-[10px] mb-4">Kabar Pesantren</p>
                        <h2 class="text-4xl md:text-5xl font-black text-emerald-950 tracking-tighter italic">
                            Berita Terkini
                        </h2>
                    </div>
                    <a href="{{ route('berita.index') }}" class="group flex items-center space-x-2 text-xs font-black uppercase tracking-widest text-emerald-900 border-b-2 border-amber-400 pb-1 hover:text-amber-600 transition">
                        <span>Lihat Semua</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                @if(isset($berita) && count($berita) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        @foreach($berita as $item)
                        <article class="group cursor-pointer">
                            <div class="relative overflow-hidden rounded-3xl aspect-[4/3] mb-6 bg-slate-100">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center bg-emerald-50 text-emerald-200">
                                        <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-1.96-2.36L6.5 17h11l-3.54-4.71z"/></svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest text-emerald-900 shadow-sm">
                                    {{ \Carbon\Carbon::parse($item->tanggal_posting ?? $item->created_at)->translatedFormat('d M Y') }}
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-emerald-950 mb-3 group-hover:text-amber-600 transition leading-tight">
                                <a href="{{ route('berita.show', $item->id) }}">{{ $item->judul }}</a>
                            </h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($item->isi), 120) }}
                            </p>
                            <a href="{{ route('berita.show', $item->id) }}" class="inline-flex items-center text-[10px] font-black text-emerald-600 uppercase tracking-widest hover:text-amber-600 transition">
                                Baca Selengkapnya <span class="ml-2">&rarr;</span>
                            </a>
                        </article>
                        @endforeach
                    </div>
                @else
                    <div class="bg-amber-50 border border-amber-100 rounded-3xl p-12 text-center">
                        <div class="w-16 h-16 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-emerald-950 mb-2">Belum ada berita</h3>
                        <p class="text-slate-500">Saat ini belum ada berita terbaru yang dipublikasikan.</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- Section: Cara Pendaftaran Removed -->


        <!-- Section: Eksplorasi Fitur -->
        <section id="fitur" class="py-32 relative z-10 bg-white overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-100 rounded-full blur-3xl opacity-30 -z-10"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-amber-100 rounded-full blur-3xl opacity-30 -z-10"></div>

            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center mb-20">
                    <p class="text-emerald-600 font-black uppercase tracking-[0.3em] text-[10px] mb-4">Fitur Lengkap</p>
                    <h2 class="text-4xl md:text-5xl font-black text-emerald-950 tracking-tighter italic">
                        Eksplorasi Fitur e-Santri
                    </h2>
                    <p class="text-slate-500 mt-4 max-w-2xl mx-auto">
                        Sistem Informasi Pesantren yang komprehensif dengan berbagai fitur untuk mendukung pengelolaan pesantren modern
                    </p>
                </div>

                <!-- Feature Categories by Role -->
                <div class="mb-20">
                    <h3 class="text-2xl font-bold text-emerald-950 mb-8 text-center">Fitur Berdasarkan Peran (Role) Pengguna</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Admin -->
                        <div class="group bg-gradient-to-br from-emerald-50 to-white rounded-3xl p-8 border-2 border-emerald-100 hover:border-emerald-300 hover:shadow-2xl transition-all duration-300 cursor-pointer">
                            <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <h4 class="text-xl font-black text-emerald-950 mb-3 uppercase tracking-wider">Admin</h4>
                            <p class="text-sm text-slate-600 mb-4">Kontrol penuh sistem dengan akses ke semua fitur manajemen</p>
                            <ul class="space-y-2 text-sm text-slate-700">
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Manajemen User & Role</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Dashboard Lengkap</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Laporan & Analitik</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Panitia -->
                        <div class="group bg-gradient-to-br from-amber-50 to-white rounded-3xl p-8 border-2 border-amber-100 hover:border-amber-300 hover:shadow-2xl transition-all duration-300 cursor-pointer">
                            <div class="w-16 h-16 bg-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <h4 class="text-xl font-black text-emerald-950 mb-3 uppercase tracking-wider">Panitia</h4>
                            <p class="text-sm text-slate-600 mb-4">Kelola data santri dan administrasi pesantren</p>
                            <ul class="space-y-2 text-sm text-slate-700">
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-amber-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Data Santri</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-amber-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Absensi & Kehadiran</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-amber-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Mutasi Santri</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Keuangan -->
                        <div class="group bg-gradient-to-br from-teal-50 to-white rounded-3xl p-8 border-2 border-teal-100 hover:border-teal-300 hover:shadow-2xl transition-all duration-300 cursor-pointer">
                            <div class="w-16 h-16 bg-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <h4 class="text-xl font-black text-emerald-950 mb-3 uppercase tracking-wider">Keuangan</h4>
                            <p class="text-sm text-slate-600 mb-4">Kelola transaksi dan keuangan pesantren</p>
                            <ul class="space-y-2 text-sm text-slate-700">
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-teal-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Pembayaran SPP</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-teal-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Laporan Keuangan</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-teal-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Riwayat Transaksi</span>
                                </li>
                            </ul>
                        </div>


                        <!-- Berita -->
                        <div class="group bg-gradient-to-br from-purple-50 to-white rounded-3xl p-8 border-2 border-purple-100 hover:border-purple-300 hover:shadow-2xl transition-all duration-300 cursor-pointer">
                            <div class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            </div>
                            <h4 class="text-xl font-black text-emerald-950 mb-3 uppercase tracking-wider">Berita</h4>
                            <p class="text-sm text-slate-600 mb-4">Informasi dan pengumuman pesantren</p>
                            <ul class="space-y-2 text-sm text-slate-700">
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-purple-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Berita Terkini</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-purple-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Pengumuman</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-purple-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>Galeri Kegiatan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Key Features -->
                <div>
                    <h3 class="text-2xl font-bold text-emerald-950 mb-8 text-center">Fitur Unggulan Sistem</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Feature 1 -->
                        <div class="bg-white rounded-2xl p-6 border border-slate-200 hover:shadow-lg transition-shadow">
                            <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            </div>
                            <h5 class="font-bold text-emerald-950 mb-2">Dashboard Interaktif</h5>
                            <p class="text-sm text-slate-600">Visualisasi data real-time dengan grafik dan statistik lengkap</p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="bg-white rounded-2xl p-6 border border-slate-200 hover:shadow-lg transition-shadow">
                            <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <h5 class="font-bold text-emerald-950 mb-2">Export Data</h5>
                            <p class="text-sm text-slate-600">Ekspor laporan ke Excel, PDF untuk kemudahan dokumentasi</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="bg-white rounded-2xl p-6 border border-slate-200 hover:shadow-lg transition-shadow">
                            <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <h5 class="font-bold text-emerald-950 mb-2">Keamanan Data</h5>
                            <p class="text-sm text-slate-600">Sistem autentikasi dan enkripsi data yang aman</p>
                        </div>

                        <!-- Feature 4 -->
                        <div class="bg-white rounded-2xl p-6 border border-slate-200 hover:shadow-lg transition-shadow">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            </div>
                            <h5 class="font-bold text-emerald-950 mb-2">Desain Responsif</h5>
                            <p class="text-sm text-slate-600">Akses dari berbagai perangkat: desktop, tablet, smartphone</p>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="mt-16 bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-3xl p-12 text-center text-white">
                    <h3 class="text-3xl font-black mb-4">Siap Menggunakan e-Santri?</h3>
                    <p class="text-emerald-100 mb-8 max-w-2xl mx-auto">Masuk untuk mengakses layanan akademik dan administrasi pesantren</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center space-x-2 bg-amber-500 text-white px-8 py-4 rounded-xl font-black uppercase text-sm tracking-widest hover:bg-amber-400 transition shadow-lg">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            <span>Login</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Dokumentasi -->
        <section id="dokumentasi" class="py-32 relative z-10 bg-white">
            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center mb-16">
                    <p class="text-emerald-600 font-black uppercase tracking-[0.3em] text-[10px] mb-4">Galeri Media</p>
                    <h2 class="text-4xl md:text-5xl font-black text-emerald-950 tracking-tighter italic">
                        Dokumentasi Kegiatan
                    </h2>
                    <p class="text-slate-500 mt-4 max-w-2xl mx-auto">
                        Saksikan berbagai kegiatan dan aktivitas santri Pondok Pesantren Nurul Falah Berbaur
                    </p>
                </div>

                <!-- Video Section - Compact -->
                <div class="mb-20">
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="text-2xl font-bold text-emerald-950">Video Kegiatan</h3>
                        <a href="https://youtube.com/@ppnurulfalahberbaur" target="_blank" class="group flex items-center space-x-2 text-xs font-black uppercase tracking-widest text-emerald-900 hover:text-amber-600 transition">
                            <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            <span>Lihat Channel</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @forelse($videos as $video)
                            <div class="group">
                                <div class="relative overflow-hidden rounded-2xl aspect-video bg-slate-900 mb-3 shadow-md border border-emerald-100/50">
                                    @if($video->embed_url)
                                        <iframe class="absolute inset-0 w-full h-full" src="{{ $video->embed_url }}" title="{{ $video->judul }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @else
                                        <div class="flex items-center justify-center h-full text-slate-400 text-xs">Link video tidak valid</div>
                                    @endif
                                </div>
                                <h4 class="text-sm font-bold text-emerald-950 group-hover:text-amber-600 transition line-clamp-1">{{ $video->judul }}</h4>
                                <p class="text-xs text-slate-500 line-clamp-2">{{ $video->keterangan ?: 'Kegiatan santri Pondok Pesantren' }}</p>
                            </div>
                        @empty
                            <div class="col-span-full py-12 px-6 bg-slate-50/80 rounded-2xl border border-dashed border-slate-200 text-center">
                                <div class="w-12 h-12 mx-auto mb-3 bg-red-100 text-red-600 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </div>
                                <p class="text-sm font-bold text-slate-700">Video Dokumentasi Sedang Dipersiapkan</p>
                                <p class="text-xs text-slate-500 mt-1 max-w-md mx-auto">Kunjungi dan subscribe channel YouTube resmi kami untuk melihat berbagai dokumentasi kegiatan santri.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Subscribe CTA - Compact -->
                    <div class="mt-8 bg-gradient-to-r from-emerald-50 to-amber-50 rounded-2xl p-8 text-center border border-emerald-100">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center shrink-0">
                                    <svg class="w-7 h-7 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </div>
                                <div class="text-left">
                                    <h4 class="text-lg font-black text-emerald-950 uppercase tracking-wider">Subscribe Channel Kami</h4>
                                    <p class="text-sm text-slate-600">Dapatkan update terbaru seputar kegiatan pesantren</p>
                                </div>
                            </div>
                            <a href="https://youtube.com/@ppnurulfalahberbaur?sub_confirmation=1" target="_blank" class="inline-flex items-center space-x-2 bg-red-600 text-white px-6 py-3 rounded-xl font-black uppercase text-xs tracking-widest hover:bg-red-700 transition shadow-lg hover:shadow-xl shrink-0">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                <span>Subscribe</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Photo Gallery Section -->
                <div>
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="text-2xl font-bold text-emerald-950">Galeri Foto</h3>
                        <span class="text-xs font-black uppercase tracking-widest text-slate-400">Dokumentasi Pondok Pesantren</span>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @forelse($galeri as $item)
                        <div class="group relative overflow-hidden rounded-2xl aspect-square bg-slate-100 cursor-pointer hover:shadow-xl transition-all duration-300">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-xs font-bold">{{ $item->judul }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full bg-emerald-50 rounded-2xl p-8 text-center text-emerald-600">
                            <p class="text-sm font-bold">Belum ada foto galeri.</p>
                        </div>
                        @endforelse
                </div>
            </div>
        </section>

        <!-- Section: Kontak -->
        <section id="kontak" class="py-32 relative z-10 bg-slate-50">
            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center mb-20">
                    <p class="text-emerald-600 font-black uppercase tracking-[0.3em] text-[10px] mb-4">Hubungi Kami</p>
                    <h2 class="text-4xl md:text-5xl font-black text-emerald-950 tracking-tighter italic">
                        Kontak Pesantren
                    </h2>
                    <p class="text-slate-500 mt-4 max-w-2xl mx-auto">
                        Silakan hubungi kontak di bawah ini untuk informasi lebih lanjut mengenai pendaftaran dan kegiatan pesantren.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Kontak 1: Pengurus Putra -->
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <h3 class="text-lg font-black text-emerald-950 mb-2 uppercase tracking-wider">Pengurus Putra</h3>
                        <p class="text-xs text-slate-400 mb-6 font-bold uppercase tracking-widest">Santri Putra</p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <div>
                                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Telepon/WA</p>
                                    <a href="https://wa.me/6281234567890" target="_blank" class="text-sm font-bold text-emerald-900 hover:text-amber-600 transition">+62 812-3456-7890</a>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <div>
                                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Email</p>
                                    <a href="mailto:putra@nurulfalahberbaur.sch.id" class="text-sm font-bold text-emerald-900 hover:text-amber-600 transition break-all">putra@nurulfalahberbaur.sch.id</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak 2: Pengurus Putri -->
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <h3 class="text-lg font-black text-emerald-950 mb-2 uppercase tracking-wider">Pengurus Putri</h3>
                        <p class="text-xs text-slate-400 mb-6 font-bold uppercase tracking-widest">Santri Putri</p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <div>
                                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Telepon/WA</p>
                                    <a href="https://wa.me/6281234567891" target="_blank" class="text-sm font-bold text-emerald-900 hover:text-amber-600 transition">+62 812-3456-7891</a>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <div>
                                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Email</p>
                                    <a href="mailto:putri@nurulfalahberbaur.sch.id" class="text-sm font-bold text-emerald-900 hover:text-amber-600 transition break-all">putri@nurulfalahberbaur.sch.id</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak 3: Admin MA -->
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="w-16 h-16 bg-teal-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <h3 class="text-lg font-black text-emerald-950 mb-2 uppercase tracking-wider">Admin MA</h3>
                        <p class="text-xs text-slate-400 mb-6 font-bold uppercase tracking-widest">MA Berbaur</p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <div>
                                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Telepon/WA</p>
                                    <a href="https://wa.me/6281234567892" target="_blank" class="text-sm font-bold text-emerald-900 hover:text-amber-600 transition">+62 812-3456-7892</a>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <div>
                                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Email</p>
                                    <a href="mailto:ma@nurulfalahberbaur.sch.id" class="text-sm font-bold text-emerald-900 hover:text-amber-600 transition break-all">ma@nurulfalahberbaur.sch.id</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak 4: Admin MTS -->
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="w-16 h-16 bg-rose-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <h3 class="text-lg font-black text-emerald-950 mb-2 uppercase tracking-wider">Admin MTS</h3>
                        <p class="text-xs text-slate-400 mb-6 font-bold uppercase tracking-widest">MTS Berbaur</p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <div>
                                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Telepon/WA</p>
                                    <a href="https://wa.me/6281234567893" target="_blank" class="text-sm font-bold text-emerald-900 hover:text-amber-600 transition">+62 812-3456-7893</a>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <div>
                                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Email</p>
                                    <a href="mailto:mts@nurulfalahberbaur.sch.id" class="text-sm font-bold text-emerald-900 hover:text-amber-600 transition break-all">mts@nurulfalahberbaur.sch.id</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Global Footer -->
        <footer class="bg-emerald-950 py-20 relative z-10 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-500 via-emerald-400 to-emerald-600"></div>
            <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <div class="col-span-1 lg:col-span-2 space-y-8">
                    <div class="flex items-center space-x-4">
                        <x-application-logo class="h-24 w-auto drop-shadow-lg" />
                        <div class="flex flex-col justify-center mt-1">
                            <h3 class="text-3xl font-black text-white uppercase tracking-tighter leading-none">e-Santri</h3>
                            <p class="text-[10px] font-black text-amber-500 uppercase tracking-[0.2em] mt-1.5 ml-0.5">Nurul Falah Berbaur</p>
                        </div>
                    </div>
                    <p class="text-emerald-100/40 text-sm max-w-sm leading-relaxed font-bold italic uppercase tracking-widest">
                        Digitalisasi Pesantren untuk Masa Depan Umat yang Lebih Baik dan Terstruktur.
                    </p>
                </div>
                <div class="space-y-6">
                    <h5 class="text-white font-black uppercase text-xs tracking-widest">Tautan</h5>
                    <ul class="space-y-4 text-emerald-100/50 text-xs font-bold uppercase tracking-widest">
                        <li><a href="#profile" class="hover:text-emerald-400 transition">Tentang Kami</a></li>
                        <li><a href="#dokumentasi" class="hover:text-emerald-400 transition">Dokumentasi</a></li>
                        <li><a href="#kontak" class="hover:text-emerald-400 transition">Kontak</a></li>
                    </ul>
                </div>
                <div class="space-y-6">
                    <h5 class="text-white font-black uppercase text-xs tracking-widest">Media Sosial</h5>
                    <div class="flex space-x-4">
                        <a href="https://youtube.com/@ppnurulfalahberbaur" target="_blank" class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-white hover:bg-emerald-500 transition group shadow-2xl">
                            <svg class="w-5 h-5 group-hover:scale-110 transition" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        <a href="https://www.instagram.com/pp.nurulfalahberbaur?igsh=MWRvZHkzeHBhNzBsaw==" target="_blank" class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-white hover:bg-emerald-500 transition group shadow-2xl">
                            <svg class="w-5 h-5 group-hover:scale-110 transition" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="https://www.facebook.com/share/17XUy5jXB4/?mibextid=wwXIfr" target="_blank" class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-white hover:bg-emerald-500 transition group shadow-2xl">
                            <svg class="w-5 h-5 group-hover:scale-110 transition" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                        <a href="https://www.tiktok.com/@ponpesnurulfalahberbaur?_r=1&_t=ZS-95gf2SV3ink" target="_blank" class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-white hover:bg-emerald-500 transition group shadow-2xl">
                            <svg class="w-5 h-5 group-hover:scale-110 transition" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-8 mt-20 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-center items-center text-[10px] font-black text-emerald-100/20 uppercase tracking-[0.2em]">
                <p>© 2026 Ponpes Nurul Falah Berbaur</p>
            </div>
        </footer>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const navLinks = document.querySelectorAll('.nav-link');
                const sections = document.querySelectorAll('main[id], section[id]');
                const underline = document.getElementById('nav-underline');
                
                function moveUnderline(element) {
                    if (element) {
                        underline.style.width = `${element.offsetWidth}px`;
                        underline.style.left = `${element.offsetLeft}px`;
                    }
                }

                // Function to update active link
                function updateActiveLink() {
                    let currentSectionId = 'home';
                    const scrollPosition = window.scrollY + 200; // Threshold for section entry

                    sections.forEach(section => {
                        const sectionTop = section.offsetTop;
                        const sectionHeight = section.offsetHeight;
                        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                            currentSectionId = section.getAttribute('id');
                        }
                    });

                    let activeLink = null;
                    navLinks.forEach(link => {
                        link.classList.remove('text-emerald-950');
                        link.classList.add('text-slate-500');
                        
                        if (link.getAttribute('href') === `#${currentSectionId}`) {
                            link.classList.remove('text-slate-500');
                            link.classList.add('text-emerald-950');
                            activeLink = link;
                        }
                    });

                    if (activeLink) {
                        moveUnderline(activeLink);
                    }
                }

                // Smooth scroll
                navLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('href');
                        const targetSection = document.querySelector(targetId);
                        
                        if (targetSection) {
                            window.scrollTo({
                                top: targetSection.offsetTop - 80,
                                behavior: 'smooth'
                            });
                        }
                    });
                });

                // Scroll listener
                window.addEventListener('scroll', updateActiveLink);
                window.addEventListener('resize', updateActiveLink);
                
                // Initial update
                setTimeout(updateActiveLink, 100);
            });
        </script>
    </body>
</html>

