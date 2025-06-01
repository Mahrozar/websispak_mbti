@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-400 to-blue-500 text-white py-12">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold mb-4">Welcome to Your MBTI Dashboard</h1>
            <p class="text-lg mb-6">Explore insights about your personality and discover tailored career paths.</p>
            <a href="{{ url('/test') }}" class="bg-white text-green-600 px-8 py-3 rounded-full font-semibold shadow-lg hover:bg-gray-100">Take the Test Now</a>
        </div>
    </section>

    <!-- Logout Button -->
    <div class="container mx-auto mt-6 flex justify-end">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md font-semibold shadow hover:bg-red-700 transition">Logout</button>
        </form>
    </div>

    <!-- Content -->
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Welcome to the Dashboard</h1>

        <!-- Search Form -->
        <div class="flex justify-center mb-6">
            <form action="/dashboard" method="GET" class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Search MBTI or Jobs" class="w-1/2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Search</button>
            </form>
        </div>

        <!-- Cards Section -->
        <div class="container mx-auto mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- MBTI Types Card -->
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <i class="fas fa-user-circle text-green-600 text-4xl mr-4"></i>
                    <h2 class="text-2xl font-bold text-green-600">MBTI Types</h2>
                </div>
                <p class="text-gray-700">
                    MBTI (Myers-Briggs Type Indicator) membagi kepribadian manusia ke dalam 16 tipe yang unik, berdasarkan kombinasi dari empat dimensi: Introvert–Extravert, Sensing–Intuition, Thinking–Feeling, dan Judging–Perceiving. 
                    Pelajari lebih dalam setiap tipe untuk memahami kelebihan, kelemahan, gaya komunikasi, dan cara berpikir seseorang. Pengetahuan ini dapat membantu dalam hubungan personal maupun profesional.
                </p>
            </div>

            <!-- Jobs Card -->
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <i class="fas fa-briefcase text-green-600 text-4xl mr-4"></i>
                    <h2 class="text-2xl font-bold text-green-600">Jobs</h2>
                </div>
                <p class="text-gray-700">
                    Berdasarkan tipe MBTI, sistem kami akan memberikan rekomendasi pekerjaan yang sesuai dengan karakteristik kepribadian Anda. Misalnya, tipe INFP cenderung cocok di bidang kreatif dan sosial seperti penulis atau konselor, sedangkan ESTJ cocok dalam posisi manajerial dan pengorganisasian. 
                    Fitur ini membantu Anda menentukan karier yang tidak hanya cocok secara teknis, tetapi juga secara psikologis dan emosional.
                </p>
            </div>

            <!-- Rules Card -->
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <i class="fas fa-cogs text-green-600 text-4xl mr-4"></i>
                    <h2 class="text-2xl font-bold text-green-600">Rules</h2>
                </div>
                <p class="text-gray-700">
                    Sistem ini menggunakan aturan (rules) yang ditetapkan untuk memetakan hubungan antara tipe MBTI dan jenis pekerjaan yang disarankan. Admin dapat menyesuaikan atau menambah rule baru untuk memperbaiki akurasi dan relevansi rekomendasi. 
                    Dengan pendekatan rule-based ini, sistem dapat dengan mudah diadaptasi untuk kebutuhan spesifik institusi atau pengguna.
                </p>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="container mx-auto mt-16">
            <h2 class="text-3xl font-bold text-center text-green-600 mb-8">MBTI Distribution</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <canvas id="mbtiChart" class="w-full max-w-2xl mx-auto"></canvas>
            </div>
        </div>

        <!-- Chatbot Section -->
        <div class="container mx-auto mt-16">
            <h2 class="text-3xl font-bold text-center text-green-600 mb-8">MBTI Chatbot</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <mbti-chatbot></mbti-chatbot>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chartEl = document.getElementById('mbtiChart');
        if (chartEl) {
            const ctx = chartEl.getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['INTJ', 'INFP', 'ENTP', 'ISFJ', 'ENFP'],
                    datasets: [{
                        label: 'Number of Users',
                        data: [12, 19, 8, 15, 10],
                        backgroundColor: 'rgba(30, 144, 255, 0.5)',
                        borderColor: 'rgba(30, 144, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'MBTI Distribution'
                        }
                    }
                }
            });
        }
    });

    // Dark mode toggle logic
    window.toggleDarkMode = () => {
        const html = document.documentElement;
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    };

    // Apply saved theme on load
    document.addEventListener('DOMContentLoaded', () => {
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    });
</script>
@endsection
