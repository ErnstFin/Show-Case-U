{{-- CV History/Management Card for Dashboard --}}

<div class="cv-management-section">
    <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-brand-pink" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000-2H3a1 1 0 00-1 1v12a1 1 0 001 1h10a1 1 0 001-1V4a1 1 0 00-1-1 1 1 0 000-2h2a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm12-3a1 1 0 100 2h.01a1 1 0 100-2H16z" clip-rule="evenodd"></path>
        </svg>
        Curriculum Vitae
    </h2>

    @if($cv && $cv->full_name)
        {{-- CV Card Display --}}
        <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition overflow-hidden border-2 border-brand-peach">
            {{-- Header Section --}}
            <div class="bg-gradient-to-r from-brand-peach to-brand-pink p-6">
                <h3 class="text-xl font-bold text-gray-800">{{ $cv->full_name }}</h3>
                <p class="text-sm text-gray-700 mt-1">📌 {{ ucfirst(str_replace('_', ' ', $cv->template)) }} Template</p>
                <p class="text-xs text-gray-600 mt-2">Diperbarui {{ $cv->updated_at->diffForHumans() }}</p>
            </div>

            {{-- CV Info Section --}}
            <div class="p-6">
                {{-- CV Preview Placeholder --}}
                <div class="mb-4 h-48 bg-gray-100 rounded-lg border border-dashed border-gray-300 flex items-center justify-center overflow-hidden">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-400 text-sm">CV Preview</p>
                    </div>
                </div>

                {{-- CV Details --}}
                <div class="mb-5 space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600 font-semibold">Profesi:</span>
                        <span class="text-gray-800">{{ $cv->profession }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 font-semibold">Email:</span>
                        <span class="text-gray-800">{{ $cv->email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 font-semibold">Telepon:</span>
                        <span class="text-gray-800">{{ $cv->phone }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 font-semibold">Terakhir Diperbarui:</span>
                        <span class="text-gray-800">{{ $cv->updated_at->format('d M Y H:i') }}</span>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="grid grid-cols-3 gap-2">
                    {{-- Edit Button --}}
                    <a href="{{ route('cv.edit', $cv->id) }}" 
                       class="bg-brand-pink text-white py-2 rounded-xl font-bold hover:bg-red-300 transition text-center text-sm flex items-center justify-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                        Edit
                    </a>

                    {{-- Download Button --}}
                    <a href="{{ route('cv.download') }}" 
                       class="bg-brand-blue text-white py-2 rounded-xl font-bold hover:bg-blue-400 transition text-center text-sm flex items-center justify-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        Download
                    </a>

                    {{-- Delete Button (Modal) --}}
                    <button onclick="openDeleteModal()" 
                            class="bg-red-400 text-white py-2 rounded-xl font-bold hover:bg-red-500 transition text-sm flex items-center justify-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        Hapus
                    </button>
                </div>

                {{-- Additional Options --}}
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <details class="text-xs">
                        <summary class="text-gray-500 hover:text-gray-700 cursor-pointer font-semibold">
                            📋 Lihat Detail CV
                        </summary>
                        <div class="mt-3 bg-gray-50 p-3 rounded-lg text-sm text-gray-700 space-y-2">
                            <p><strong>Ringkasan Profesional:</strong></p>
                            <p class="text-xs text-gray-600 line-clamp-2">{{ $cv->summary ?? '-' }}</p>
                            
                            <p class="mt-2"><strong>Keahlian:</strong></p>
                            <p class="text-xs text-gray-600 line-clamp-2">{{ $cv->skills ?? '-' }}</p>
                        </div>
                    </details>
                </div>
            </div>
        </div>

        {{-- Create New CV Option --}}
        <div class="mt-4">
            <a href="{{ route('cv.select_template') }}" 
               class="w-full bg-gradient-to-r from-brand-peach to-brand-pink text-white py-3 rounded-2xl font-bold hover:shadow-lg transition text-center block">
                ➕ Buat CV Baru
            </a>
        </div>

    @else
        {{-- No CV Created Yet --}}
        <div class="bg-white rounded-3xl shadow-lg p-10 text-center border border-brand-peach">
            <div class="w-20 h-20 bg-brand-peach rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-brand-pink" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
            </div>
            <p class="text-gray-600 text-lg font-semibold mb-2">Belum ada CV</p>
            <p class="text-gray-500 text-sm mb-6">Buat CV pertamamu dan lihat hasilnya dalam berbagai template profesional!</p>
            <a href="{{ route('cv.select_template') }}" 
               class="inline-block bg-gradient-to-r from-brand-pink to-brand-peach text-white px-8 py-3 rounded-2xl font-bold hover:shadow-lg transition">
                🚀 Mulai Buat CV
            </a>
        </div>
    @endif
</div>

{{-- Delete Modal --}}
@if($cv && $cv->full_name)
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center rounded-lg">
    <div class="bg-white rounded-3xl p-8 max-w-sm mx-4">
        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <h3 class="text-lg font-bold text-gray-800 text-center mb-2">Hapus CV?</h3>
        <p class="text-sm text-gray-600 text-center mb-6">Tindakan ini tidak dapat dibatalkan. CV "{{ $cv->full_name }}" akan dihapus secara permanen.</p>
        
        <form action="{{ route('cv.destroy', $cv->id) }}" method="POST" class="space-y-3">
            @csrf
            @method('DELETE')
            
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-xl font-bold hover:bg-red-600 transition">
                Ya, Hapus CV
            </button>
        </form>
        
        <button onclick="closeDeleteModal()" class="w-full bg-gray-200 text-gray-800 py-2 rounded-xl font-bold hover:bg-gray-300 transition mt-2">
            Batal
        </button>
    </div>
</div>
@endif

<script>
function openDeleteModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}
</script>
