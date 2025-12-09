<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Template CV - ShowCase U</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-pink': '#FFB5B6', 'brand-peach': '#FFE5D9',
                        'brand-white': '#FFFFFF', 'brand-sky': '#D6EBF2', 'brand-blue': '#A3C4D9',
                    },
                    fontFamily: { 'poppins': ['Poppins', 'sans-serif'] }
                }
            }
        }
    </script>
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-brand-sky min-h-screen py-10 px-4">

    <div class="max-w-5xl mx-auto mb-6 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" class="bg-white p-2 rounded-full shadow-sm hover:bg-brand-peach transition text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-gray-700">CV Generator</h1>
        </div>
    </div>

    <div class="bg-white w-full max-w-5xl mx-auto rounded-[35px] shadow-xl overflow-hidden relative border border-white">
        
        <div class="bg-brand-peach px-8 py-6">
            <h2 class="text-gray-800 font-bold text-3xl">Pilih Template CV Anda</h2>
            <p class="text-sm text-gray-600 mt-2">Pilih desain yang paling cocok untuk karier Anda. Anda bisa menggantinya kapan saja.</p>
        </div>

        <div class="p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                
                {{-- Pilihan 1: Template Modern (Visual) --}}
                <div class="bg-white border-2 border-gray-100 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden hover:-translate-y-2">
                    <div class="p-6 bg-gradient-to-r from-brand-peach to-orange-100">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Template Modern</h3>
                        <p class="text-sm text-gray-600">Cocok untuk industri kreatif atau posisi yang mengutamakan desain dan visual.</p>
                    </div>
                    {{-- Preview Image --}}
                    <div class="relative h-80 bg-gray-50 border-t border-gray-200 overflow-hidden flex items-center justify-center">
                        <img src="/images/placeholder-modern.svg" alt="Preview Template Modern" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/10 pointer-events-none"></div>
                    </div>
                    <div class="p-6 border-t border-gray-100">
                        <ul class="text-sm text-gray-600 space-y-2 mb-6">
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-pink flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Desain modern dan menarik</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-pink flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Cocok untuk portofolio visual</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-pink flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Format profesional</span>
                            </li>
                        </ul>
                        <a href="{{ route('cv.create', ['template' => 'template']) }}" class="w-full bg-brand-pink text-white px-6 py-3 rounded-xl font-bold hover:bg-red-300 transition duration-150 text-center block">
                            Pilih Template Ini →
                        </a>
                    </div>
                </div>

                {{-- Pilihan 2: Template ATS Friendly (Sederhana) --}}
                <div class="bg-white border-2 border-gray-100 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden hover:-translate-y-2">
                    <div class="p-6 bg-gradient-to-r from-blue-100 to-brand-sky">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Template ATS Friendly</h3>
                        <p class="text-sm text-gray-600">Sederhana dan optimal dibaca oleh sistem pelacakan pelamar (ATS) perusahaan.</p>
                    </div>
                    {{-- Preview Image --}}
                    <div class="relative h-80 bg-gray-50 border-t border-gray-200 overflow-hidden flex items-center justify-center">
                        <img src="/images/placeholder-ats.svg" alt="Preview Template ATS" class="w-full h-full object-cover" onerror="this.src='/images/placeholder-ats.svg'">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/10 pointer-events-none"></div>
                    </div>
                    <div class="p-6 border-t border-gray-100">
                        <ul class="text-sm text-gray-600 space-y-2 mb-6">
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-blue flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Kompatibel dengan ATS</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-blue flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Format sederhana dan clean</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-blue flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Fokus pada konten</span>
                            </li>
                        </ul>
                        <a href="{{ route('cv.create', ['template' => 'ats_template']) }}" class="w-full bg-brand-blue text-white px-6 py-3 rounded-xl font-bold hover:bg-cyan-400 transition duration-150 text-center block">
                            Pilih Template Ini →
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>
