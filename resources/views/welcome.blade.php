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
<<<<<<< HEAD
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="currentColor"/></svg>
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>
=======
        
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
>>>>>>> 4e3c7f9d635f966cbf4afd1819d6c0210a925292

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
