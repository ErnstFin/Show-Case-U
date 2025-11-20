<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ShowCase U — Showcase Your Creative Journey</title>
        <meta name="description" content="ShowCase U membantu kreator menampilkan portofolio mobile-ready, terhubung dengan mentor, dan menangkap peluang kolaborasi terbaru.">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Fallback Alpine.js jika Vite tidak tersedia -->
        <script>
            // Pastikan Alpine.js ter-load
            if (typeof Alpine === 'undefined') {
                document.addEventListener('DOMContentLoaded', function() {
                    var script = document.createElement('script');
                    script.src = 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js';
                    script.defer = true;
                    document.head.appendChild(script);
                });
            }
        </script>
    </head>
    <body class="landing-page">
        <div class="landing-container">
            <div class="landing-background">
                <div class="landing-gradient-top"></div>
                <div class="landing-blur-1"></div>
                <div class="landing-blur-2"></div>
            </div>

            <div class="landing-content">
                <header class="landing-header">
                    <div class="logo-section">
                        <div class="logo-box">
                            <span class="logo-text">SU</span>
                        </div>
                        <div>
                            <p class="logo-text">ShowCase U</p>
                            <p class="logo-subtitle">Landing mobile ready untuk kreator</p>
                        </div>
                    </div>

                    @if (Route::has('login'))
                    <div class="nav-links">
                        <a href="#feature">Fitur</a>
                        <a href="#stories">Cerita</a>
                        <a href="#plans">Harga</a>
                        <a href="{{ route('builder') }}">Builder</a>

                        @auth
                            <a href="{{ url('/home') }}" class="nav-button">Home</a>
                            <a href="{{ url('/dashboard') }}" class="nav-button">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="nav-button">Keluar</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-button">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-button nav-button-primary">Daftar</a>
                            @endif
                        @endauth
                    </div>
                    @endif
                    </header>

                <main class="mt-12 flex flex-col gap-24">
                    <section class="grid gap-12 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,0.95fr)] lg:items-center">
                        <div class="space-y-8">
                            <p class="text-sm font-semibold uppercase tracking-[0.35em] text-white/70">Mobile first showcase</p>
                            <div class="space-y-6">
                                <h1 class="text-4xl font-semibold leading-tight tracking-tight text-white sm:text-5xl">
                                    Bangun landing portofolio interaktif hanya dengan sentuhan mobile.
                                </h1>
                                <p class="text-lg text-white/70">
                                    Rancang cerita visual, publish dalam hitungan menit, dan bagikan link bernilai tinggi untuk rekruter atau brand yang ingin melihat karya terbaikmu.
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-4">
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-6 py-3 text-base font-semibold text-slate-900 shadow-2xl shadow-violet-500/30 transition hover:-translate-y-0.5 hover:bg-slate-100">
                                        Mulai Gratis
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12h14m0 0-6-6m6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                @endif
                                <a href="#demo" class="inline-flex items-center justify-center gap-2 rounded-full border border-white/20 px-6 py-3 text-base font-semibold text-white transition hover:border-white hover:text-white">
                                    Lihat Prototipe
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 5v14m0 0-6-6m6 6 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>

                            <div class="grid grid-cols-2 gap-6 text-white/80 sm:grid-cols-3">
                                <div>
                                    <p class="text-4xl font-semibold text-white">2.4K+</p>
                                    <p class="text-sm text-white/60">landing tayang tiap minggu</p>
                                </div>
                                <div>
                                    <p class="text-4xl font-semibold text-white">87%</p>
                                    <p class="text-sm text-white/60">talent dapat leads baru</p>
                                </div>
                                <div>
                                    <p class="text-4xl font-semibold text-white">140+</p>
                                    <p class="text-sm text-white/60">brand aktif kolaborasi</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative mx-auto w-full max-w-[420px]" id="demo">
                            <div class="absolute inset-0 -z-10 rounded-[38px] bg-gradient-to-r from-fuchsia-500/40 via-violet-500/30 to-sky-400/20 blur-2xl"></div>
                            <div class="relative rounded-[38px] border border-white/10 bg-white/5 p-5 backdrop-blur-2xl">
                                <div class="rounded-[28px] border border-white/10 bg-slate-900/60 p-6 shadow-2xl">
                                    <div class="flex items-center justify-between text-sm text-white/70">
                                        <div class="space-y-1">
                                            <p class="text-xs uppercase tracking-[0.4em] text-white/50">Upcoming</p>
                                            <p class="text-lg font-semibold text-white">UI Designer Mentoring</p>
                                        </div>
                                        <span class="rounded-full bg-white/10 px-4 py-1 text-xs text-white">Live</span>
                                </div>

                                    <div class="mt-6 space-y-4">
                                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm text-white/60">Progress Portofolio</p>
                                                <p class="text-sm font-semibold text-white">78%</p>
                                            </div>
                                            <div class="mt-3 h-2 w-full rounded-full bg-white/10">
                                                <div class="h-2 w-3/4 rounded-full bg-gradient-to-r from-fuchsia-400 to-violet-400"></div>
                                            </div>
                                        </div>

                                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                            <div class="flex items-center justify-between text-sm">
                                                <p class="text-white/70">Next review</p>
                                                <p class="font-semibold text-white">16 Nov</p>
                                            </div>
                                            <p class="mt-3 text-sm text-white/60">Brief + storyline video siap dikirim ke brand.</p>
                                        </div>

                                        <div class="rounded-2xl border border-white/10 bg-gradient-to-br from-white/30 to-white/5 p-4 text-slate-900 shadow-xl shadow-fuchsia-500/20">
                                            <p class="text-xs font-semibold uppercase tracking-[0.4em] text-slate-900/60">Share link</p>
                                            <p class="mt-3 text-lg font-semibold">showcaseu.app/hanifah</p>
                                            <p class="mt-2 text-sm text-slate-900/70">Copy & bagikan ke brand favoritmu.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="feature" class="space-y-10">
                        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                            <div class="space-y-3 max-w-3xl">
                                <p class="text-sm font-semibold uppercase tracking-[0.4em] text-white/60">Kenapa ShowCase U</p>
                                <h2 class="text-3xl font-semibold text-white sm:text-4xl">All-in-one landing workspace yang mendekati desain Figmamu.</h2>
                                <p class="text-white/70">Semua modul dibuat adaptif untuk layar mobile, lengkap dengan komponen drag-and-drop, review mentor, hingga analytics real-time.</p>
                            </div>
                            <a href="#stories" class="inline-flex items-center gap-2 text-sm font-semibold text-fuchsia-200 transition hover:text-white">
                                Pelajari alur lengkap
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12h14m0 0-6-6m6 6-6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>

                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <article class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur">
                                <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-fuchsia-500/30 to-violet-500/30 text-2xl">
                                    📱
                                </div>
                                <h3 class="text-xl font-semibold">Komponen Adaptif</h3>
                                <p class="mt-3 text-sm leading-relaxed text-white/70">Drag section hero, katalog karya, video, hingga link CTA dengan layout yang otomatis responsif seperti di Figma mobile frame.</p>
                                <ul class="mt-6 space-y-2 text-sm text-white/70">
                                    <li>• Grid 8pt siap pakai</li>
                                    <li>• State button & badge</li>
                                    <li>• Auto preview di layar iPhone</li>
                                </ul>
                            </article>

                            <article class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur">
                                <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-500/30 to-cyan-400/30 text-2xl">
                                    ✏️
                                </div>
                                <h3 class="text-xl font-semibold">Storyline Builder</h3>
                                <p class="mt-3 text-sm leading-relaxed text-white/70">Susun narasi personal, timeline project, hingga testimoni otomatis. Sistem copy-guide mengikuti tone brand yang kamu pilih.</p>
                                <ul class="mt-6 space-y-2 text-sm text-white/70">
                                    <li>• Template tone (Bold, Friendly, Calm)</li>
                                    <li>• Auto highlight KPI</li>
                                    <li>• Export ke Notion atau PDF</li>
                                </ul>
                            </article>

                            <article class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur md:col-span-2 lg:col-span-1">
                                <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-400/40 to-pink-400/30 text-2xl">
                                    📊
                                </div>
                                <h3 class="text-xl font-semibold">Insight & Follow-up</h3>
                                <p class="mt-3 text-sm leading-relaxed text-white/70">Pantau siapa saja yang membuka landing-mu, halaman mana yang populer, serta otomatis kirim follow-up deck.</p>
                                <ul class="mt-6 space-y-2 text-sm text-white/70">
                                    <li>• Heatmap interaksi</li>
                                    <li>• Smart lead scoring</li>
                                    <li>• Integrasi WhatsApp & Email</li>
                                </ul>
                            </article>
                        </div>
                    </section>

                    <section id="stories" class="grid gap-12 lg:grid-cols-2 lg:items-center">
                        <div class="rounded-[32px] border border-white/10 bg-white text-slate-900 p-10 shadow-2xl">
                            <p class="text-xs font-semibold uppercase tracking-[0.4em] text-slate-500">Langkah</p>
                            <h3 class="mt-4 text-3xl font-semibold">Workflow yang meniru board Figmamu.</h3>
                            <div class="mt-10 space-y-6">
                                <div class="flex items-start gap-4">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-white">1</div>
                                    <div>
                                        <p class="text-lg font-semibold">Pilih frame</p>
                                        <p class="text-sm text-slate-600">Import gaya typografi, scale, serta warna brand langsung dari file Figma.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-white">2</div>
                                    <div>
                                        <p class="text-lg font-semibold">Kustom konten</p>
                                        <p class="text-sm text-slate-600">Tambahkan copy, galeri, maupun video portrait ke setiap section.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-white">3</div>
                                    <div>
                                        <p class="text-lg font-semibold">Share & tracking</p>
                                        <p class="text-sm text-slate-600">Publikasikan landing custom domain + analytics real time.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-8">
                            <div class="space-y-3">
                                <p class="text-sm font-semibold uppercase tracking-[0.4em] text-white/60">Cerita kreator</p>
                                <h3 class="text-3xl font-semibold">Apa kata mereka setelah memindahkan portofolio ke ShowCase U?</h3>
                                <p class="text-white/70">Testimoni berikut kami pilih dari kreator mobile & social specialist yang awalnya hanya mengandalkan PDF.</p>
                            </div>
                            <div class="grid gap-6 md:grid-cols-2">
                                <article class="rounded-3xl border border-white/10 bg-white/5 p-6">
                                    <p class="text-sm text-white/80">“Timeline builder bikin aku hemat 2 hari tiap kali bikin deck brand. Layout-nya persis board Figma jadi tinggal drag aja.”</p>
                                    <div class="mt-4">
                                        <p class="font-semibold text-white">Hanifah K.</p>
                                        <p class="text-sm text-white/60">Freelance UI Motion</p>
                                    </div>
                                </article>
                                <article class="rounded-3xl border border-white/10 bg-white/5 p-6">
                                    <p class="text-sm text-white/80">“Link showcase jadi senjata utama saat chat talent acquisition. Data insight-nya langsung kasih tahu brand mana yang tertarik.”</p>
                                    <div class="mt-4">
                                        <p class="font-semibold text-white">Vicky Pratama</p>
                                        <p class="text-sm text-white/60">Social Media Lead</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </section>

                    <section id="plans" class="space-y-8">
                        <div class="space-y-3 text-center">
                            <p class="text-sm font-semibold uppercase tracking-[0.4em] text-white/60">Harga fleksibel</p>
                            <h3 class="text-3xl font-semibold">Mulai gratis, upgrade kapan pun.</h3>
                            <p class="text-white/70">Tanpa kartu kredit. Upgrade hanya jika siap publish domain kustom & analytics premium.</p>
                        </div>

                        <div class="grid gap-6 lg:grid-cols-3">
                            <div class="rounded-[30px] border border-white/10 bg-white/5 p-6">
                                <p class="text-sm font-semibold text-white/70">Starter</p>
                                <p class="mt-4 text-4xl font-semibold text-white">Rp0</p>
                                <ul class="mt-6 space-y-3 text-sm text-white/70">
                                    <li>• 3 landing aktif</li>
                                    <li>• Komponen dasar</li>
                                    <li>• Share link showcaseu.app</li>
                                </ul>
                            </div>

                            <div class="rounded-[30px] border border-white/10 bg-gradient-to-br from-fuchsia-500/40 via-violet-500/30 to-sky-500/20 p-1 shadow-2xl shadow-fuchsia-500/30">
                                <div class="h-full rounded-[26px] bg-slate-950 p-6">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-white/70">Creator Pro</p>
                                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs uppercase tracking-widest text-white">Best</span>
                                    </div>
                                    <p class="mt-4 text-4xl font-semibold text-white">Rp149K</p>
                                    <p class="text-sm text-white/60">per bulan</p>
                                    <ul class="mt-6 space-y-3 text-sm text-white/80">
                                        <li>• Unlimited landing & komponen advance</li>
                                        <li>• Domain custom + SSL</li>
                                        <li>• Insight & lead automation</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="rounded-[30px] border border-white/10 bg-white/5 p-6">
                                <p class="text-sm font-semibold text-white/70">Studio</p>
                                <p class="mt-4 text-4xl font-semibold text-white">Hubungi</p>
                                <ul class="mt-6 space-y-3 text-sm text-white/70">
                                    <li>• Kolaborasi tim & klien</li>
                                    <li>• Onboarding mentor internal</li>
                                    <li>• Dukungan prioritas 24/7</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section class="rounded-[46px] bg-gradient-to-r from-fuchsia-600 via-violet-600 to-indigo-600 p-[1px]">
                        <div class="rounded-[44px] bg-slate-950 px-8 py-12 text-center sm:px-16">
                            <p class="text-sm font-semibold uppercase tracking-[0.4em] text-white/70">Siap tampil?</p>
                            <h3 class="mt-4 text-3xl font-semibold text-white">Buat landing versi Figmamu sekarang.</h3>
                            <p class="mt-3 text-white/70">Tinggal drag komponen, sync konten, bagikan link ke brand favoritmu.</p>
                            <div class="mt-8 flex flex-wrap justify-center gap-4">
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-base font-semibold text-slate-900">
                                        Daftar & publish gratis
                                    </a>
                                @endif
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full border border-white/20 px-6 py-3 text-base font-semibold text-white">
                                        Sudah punya akun? Masuk
                                    </a>
                                @endif
                            </div>
                        </div>
                    </section>
                    </main>

                <footer class="mt-16 border-t border-white/10 pt-8 text-sm text-white/60">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <p>© {{ date('Y') }} ShowCase U. Semua hak cipta.</p>
                        <div class="flex gap-6">
                            <a href="#" class="transition hover:text-white">Kebijakan Privasi</a>
                            <a href="#" class="transition hover:text-white">Bantuan</a>
                            <a href="mailto:hello@showcaseu.app" class="transition hover:text-white">hello@showcaseu.app</a>
                        </div>
                    </div>
                    </footer>
            </div>
        </div>
    </body>
</html>
