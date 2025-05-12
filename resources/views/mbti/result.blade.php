@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-3xl bg-white rounded-lg shadow-lg p-8">
        <div class="relative flex flex-col items-center justify-center mb-8">
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none">
                <svg width="180" height="60" viewBox="0 0 180 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="90" cy="30" rx="85" ry="22" fill="#e0e7ff" fill-opacity="0.5"/>
                    <ellipse cx="90" cy="30" rx="70" ry="18" fill="#c7d2fe" fill-opacity="0.7"/>
                </svg>
            </div>
            <h1 class="relative z-10 text-4xl md:text-5xl font-extrabold text-blue-700 text-center mb-2 drop-shadow-lg tracking-wide animate-fade-in">
                <span class="inline-block align-middle">🎉</span>
                <span class="bg-gradient-to-r from-blue-400 via-blue-600 to-blue-400 bg-clip-text text-transparent">Hasil Tes MBTI Anda</span>
                <span class="inline-block align-middle">🎉</span>
            </h1>
            <div class="relative z-10 flex justify-center mt-2">
                <span class="inline-block bg-gradient-to-r from-blue-400 to-blue-700 text-white px-10 py-4 rounded-full text-4xl md:text-5xl font-extrabold shadow-lg border-4 border-blue-200 animate-bounce tracking-widest">{{ $mbtiResult }}</span>
            </div>
        </div>
        <!-- Avatar image removed as requested -->
        <div class="mb-8">
            <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded mb-4 animate-fade-in">
                <h3 class="font-bold text-green-700 mb-2">Tips untuk {{ $mbtiResult }}</h3>
                <p>Kenali kekuatan utama Anda dan gunakan untuk berkembang. Jangan ragu untuk mengeksplorasi peluang baru yang sesuai dengan kepribadian Anda!</p>
            </div>
            <div class="text-center mt-4">
                <a href="https://www.16personalities.com/id/tipe-kepribadian-{{ strtolower($mbtiResult) }}" target="_blank" class="inline-block bg-blue-100 text-blue-700 px-6 py-2 rounded-full font-semibold shadow hover:bg-blue-200 transition">Pelajari lebih lanjut tentang {{ $mbtiResult }}</a>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-center gap-6 mb-8">
            <div class="bg-gradient-to-br from-blue-100 to-blue-300 rounded-xl shadow-lg p-6 flex-1 text-center">
                <p class="text-lg text-gray-700 mb-2">Tipe MBTI Anda:</p>
                <span class="text-5xl font-extrabold text-blue-800 tracking-widest">{{ $mbtiResult }}</span>
                @if(isset($mbti))
                <div class="mt-4">
                    <h2 class="text-xl font-semibold text-blue-700 mb-1">Deskripsi Tipe</h2>
                    <p class="text-gray-700 italic">{{ $mbti->description ?? 'Deskripsi tidak tersedia.' }}</p>
                </div>
                @endif
                <div class="mt-6">
                    <h2 class="text-lg font-semibold text-blue-700 mb-2">Skor Dimensi MBTI Anda</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2 w-full mt-2">
                        <div class="bg-blue-50 p-2 rounded text-center text-blue-800 font-bold">E: {{ $mbtiScores['E'] }}</div>
                        <div class="bg-blue-50 p-2 rounded text-center text-blue-800 font-bold">I: {{ $mbtiScores['I'] }}</div>
                        <div class="bg-blue-50 p-2 rounded text-center text-blue-800 font-bold">S: {{ $mbtiScores['S'] }}</div>
                        <div class="bg-blue-50 p-2 rounded text-center text-blue-800 font-bold">N: {{ $mbtiScores['N'] }}</div>
                        <div class="bg-blue-50 p-2 rounded text-center text-blue-800 font-bold">T: {{ $mbtiScores['T'] }}</div>
                        <div class="bg-blue-50 p-2 rounded text-center text-blue-800 font-bold">F: {{ $mbtiScores['F'] }}</div>
                        <div class="bg-blue-50 p-2 rounded text-center text-blue-800 font-bold">J: {{ $mbtiScores['J'] }}</div>
                        <div class="bg-blue-50 p-2 rounded text-center text-blue-800 font-bold">P: {{ $mbtiScores['P'] }}</div>
                    </div>
                </div>
            </div>
            <div class="flex-1 flex flex-col items-center">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Diagram Skor MBTI</h2>
                <canvas id="mbtiChart" class="w-full max-w-xs md:max-w-sm mx-auto mb-2"></canvas>
            </div>
        </div>
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 text-center">Progress Skor Dimensi MBTI</h2>
            <div class="space-y-4">
                <div>
                    <span class="font-semibold">Ekstrovert (E)</span>
                    <div class="w-full bg-blue-100 rounded-full h-4">
                        <div class="bg-blue-500 h-4 rounded-full transition-all duration-700" style="width: {{ max(5, min(100, $mbtiScores['E']*10)) }}%"></div>
                    </div>
                </div>
                <div>
                    <span class="font-semibold">Introvert (I)</span>
                    <div class="w-full bg-blue-100 rounded-full h-4">
                        <div class="bg-blue-800 h-4 rounded-full transition-all duration-700" style="width: {{ max(5, min(100, $mbtiScores['I']*10)) }}%"></div>
                    </div>
                </div>
                <div>
                    <span class="font-semibold">Sensing (S)</span>
                    <div class="w-full bg-green-100 rounded-full h-4">
                        <div class="bg-green-500 h-4 rounded-full transition-all duration-700" style="width: {{ max(5, min(100, $mbtiScores['S']*10)) }}%"></div>
                    </div>
                </div>
                <div>
                    <span class="font-semibold">Intuition (N)</span>
                    <div class="w-full bg-green-100 rounded-full h-4">
                        <div class="bg-green-800 h-4 rounded-full transition-all duration-700" style="width: {{ max(5, min(100, $mbtiScores['N']*10)) }}%"></div>
                    </div>
                </div>
                <div>
                    <span class="font-semibold">Thinking (T)</span>
                    <div class="w-full bg-yellow-100 rounded-full h-4">
                        <div class="bg-yellow-500 h-4 rounded-full transition-all duration-700" style="width: {{ max(5, min(100, $mbtiScores['T']*10)) }}%"></div>
                    </div>
                </div>
                <div>
                    <span class="font-semibold">Feeling (F)</span>
                    <div class="w-full bg-yellow-100 rounded-full h-4">
                        <div class="bg-yellow-800 h-4 rounded-full transition-all duration-700" style="width: {{ max(5, min(100, $mbtiScores['F']*10)) }}%"></div>
                    </div>
                </div>
                <div>
                    <span class="font-semibold">Judging (J)</span>
                    <div class="w-full bg-purple-100 rounded-full h-4">
                        <div class="bg-purple-500 h-4 rounded-full transition-all duration-700" style="width: {{ max(5, min(100, $mbtiScores['J']*10)) }}%"></div>
                    </div>
                </div>
                <div>
                    <span class="font-semibold">Perceiving (P)</span>
                    <div class="w-full bg-purple-100 rounded-full h-4">
                        <div class="bg-purple-800 h-4 rounded-full transition-all duration-700" style="width: {{ max(5, min(100, $mbtiScores['P']*10)) }}%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 text-center">💼 Rekomendasi Pekerjaan</h2>
            <ul class="space-y-6">
                @forelse ($recommendations as $job)
                    <li class="bg-gradient-to-r from-blue-100 to-blue-200 border-l-8 border-blue-400 shadow p-6 rounded-xl flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <span class="text-3xl">🌟</span>
                            <div>
                                <h3 class="text-xl font-bold text-blue-800 mb-1">{{ $job['job'] }}</h3>
                                <p class="text-gray-600">{{ $job['description'] }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <span class="text-lg font-semibold text-blue-700">Tingkat Kecocokan</span>
                            <span class="text-2xl font-extrabold text-blue-900">{{ number_format($job['certainty'], 2) }}%</span>
                        </div>
                    </li>
                @empty
                    <li class="text-gray-600 text-center">Tidak ada rekomendasi pekerjaan yang tersedia untuk tipe MBTI Anda.</li>
                @endforelse
            </ul>
        </div>
        <div class="flex justify-center mt-6 gap-4">
            <a href="https://wa.me/?text=Hasil%20Tes%20MBTI%20saya%20adalah%20{{ $mbtiResult }}!%20Lihat%20deskripsi%20dan%20rekomendasi%20pekerjaan%20di%20website%20ini." target="_blank" class="inline-flex items-center bg-green-500 text-white px-4 py-2 rounded-full font-semibold shadow hover:bg-green-600 transition">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A11.93 11.93 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.11.55 4.16 1.6 5.97L0 24l6.22-1.63A11.93 11.93 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.19-1.24-6.19-3.48-8.52zM12 22c-1.85 0-3.66-.5-5.22-1.44l-.37-.22-3.69.97.99-3.59-.24-.37A9.94 9.94 0 0 1 2 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.2-7.8c-.28-.14-1.65-.81-1.9-.9-.25-.09-.43-.14-.61.14-.18.28-.7.9-.86 1.08-.16.18-.32.2-.6.07-.28-.14-1.18-.44-2.25-1.41-.83-.74-1.39-1.65-1.55-1.93-.16-.28-.02-.43.12-.57.13-.13.28-.34.42-.51.14-.17.18-.29.28-.48.09-.19.05-.36-.02-.5-.07-.14-.61-1.47-.84-2.01-.22-.53-.45-.46-.62-.47-.16-.01-.36-.01-.56-.01-.19 0-.5.07-.76.34-.26.27-1 1-.97 2.43.03 1.43 1.03 2.81 1.18 3.01.15.2 2.03 3.1 4.93 4.22.69.3 1.23.48 1.65.61.69.22 1.32.19 1.82.12.56-.08 1.65-.67 1.89-1.32.23-.65.23-1.2.16-1.32-.07-.12-.25-.19-.53-.33z"/></svg>
                Bagikan ke WhatsApp
            </a>
            <a href="https://twitter.com/intent/tweet?text=Hasil%20Tes%20MBTI%20saya%20adalah%20{{ $mbtiResult }}!%20Lihat%20deskripsi%20dan%20rekomendasi%20pekerjaan%20di%20website%20ini." target="_blank" class="inline-flex items-center bg-blue-400 text-white px-4 py-2 rounded-full font-semibold shadow hover:bg-blue-600 transition">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.56c-.88.39-1.83.65-2.83.77a4.92 4.92 0 0 0 2.15-2.71c-.95.56-2 .97-3.13 1.19A4.92 4.92 0 0 0 16.67 3c-2.73 0-4.94 2.21-4.94 4.94 0 .39.04.77.12 1.13C7.69 8.82 4.07 6.88 1.64 3.9c-.43.74-.68 1.6-.68 2.52 0 1.74.89 3.28 2.25 4.18-.83-.03-1.61-.25-2.29-.63v.06c0 2.43 1.73 4.46 4.03 4.92-.42.12-.87.18-1.33.18-.32 0-.63-.03-.93-.09.63 1.97 2.45 3.4 4.6 3.44A9.87 9.87 0 0 1 0 21.54a13.94 13.94 0 0 0 7.56 2.22c9.05 0 14-7.5 14-14 0-.21 0-.42-.02-.63A9.93 9.93 0 0 0 24 4.56z"/></svg>
                Bagikan ke Twitter
            </a>
        </div>
        <div class="flex justify-center mt-8 gap-4 animate-fade-in">
            <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="inline-flex items-center bg-blue-700 text-white px-4 py-2 rounded-full font-semibold shadow hover:bg-blue-900 transition">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.595 0 0 .592 0 1.326v21.348C0 23.408.595 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.408 24 22.674V1.326C24 .592 23.406 0 22.675 0"/></svg>
                Bagikan ke Facebook
            </a>
        </div>
        <div class="text-center mt-8">
            <a href="/dashboard" class="inline-block bg-gradient-to-r from-blue-500 to-blue-700 text-white px-8 py-3 rounded-full text-lg font-bold shadow hover:from-blue-600 hover:to-blue-800 transition">Kembali ke Dashboard</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('mbtiChart').getContext('2d');
    const mbtiChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['E', 'I', 'S', 'N', 'T', 'F', 'J', 'P'],
            datasets: [{
                label: 'Skor Dimensi',
                data: [
                    {{ $mbtiScores['E'] ?? 0 }},
                    {{ $mbtiScores['I'] ?? 0 }},
                    {{ $mbtiScores['S'] ?? 0 }},
                    {{ $mbtiScores['N'] ?? 0 }},
                    {{ $mbtiScores['T'] ?? 0 }},
                    {{ $mbtiScores['F'] ?? 0 }},
                    {{ $mbtiScores['J'] ?? 0 }},
                    {{ $mbtiScores['P'] ?? 0 }}
                ],
                backgroundColor: [
                    'rgba(59,130,246,0.7)', // E
                    'rgba(30,64,175,0.7)', // I
                    'rgba(34,197,94,0.7)', // S
                    'rgba(16,185,129,0.7)', // N
                    'rgba(250,204,21,0.7)', // T
                    'rgba(202,138,4,0.7)', // F
                    'rgba(168,85,247,0.7)', // J
                    'rgba(109,40,217,0.7)'  // P
                ],
                borderColor: [
                    'rgba(59,130,246,1)',
                    'rgba(30,64,175,1)',
                    'rgba(34,197,94,1)',
                    'rgba(16,185,129,1)',
                    'rgba(250,204,21,1)',
                    'rgba(202,138,4,1)',
                    'rgba(168,85,247,1)',
                    'rgba(109,40,217,1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Diagram Skor Dimensi MBTI',
                    font: { size: 18 }
                },
                tooltip: {
                    enabled: true,
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endsection
