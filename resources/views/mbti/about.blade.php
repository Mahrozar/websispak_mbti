<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-lg font-bold">MBTI App</a>
            <div class="space-x-4">
                <a href="/dashboard" class="text-white hover:underline">Dashboard</a>
                <a href="/about" class="text-white hover:underline">About</a>
                <button onclick="toggleDarkMode()" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">Toggle Dark Mode</button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-400 to-blue-500 text-white py-12">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold mb-4">About MBTI App</h1>
            <p class="text-lg mb-6">Learn more about the purpose and features of this MBTI App.</p>
        </div>
    </section>

    <!-- About Content -->
    <div class="container mx-auto mt-8 px-4">
        <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">What is MBTI?</h2>
        <p class="text-gray-700 text-xl mb-4">The Myers-Briggs Type Indicator (MBTI) is a popular personality test that helps people understand their psychological preferences and how they perceive the world. By identifying your MBTI type, you can gain insights into your natural strengths, weaknesses, and how you interact with others.</p>

        <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Our Purpose</h2>
        <p class="text-gray-700 text-xl mb-4">This MBTI App is designed to provide users with detailed information about their personality type, along with career recommendations and helpful resources. Whether you're looking to understand yourself better or explore new career paths, this app offers a personalized approach to discovering your potential.</p>

        <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <i class="fas fa-user-circle text-green-600 text-4xl mr-4"></i>
                    <h3 class="text-2xl font-bold text-green-600">MBTI Types</h3>
                </div>
                <p class="text-gray-700">Learn about the different MBTI personality types and their unique characteristics.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <i class="fas fa-briefcase text-green-600 text-4xl mr-4"></i>
                    <h3 class="text-2xl font-bold text-green-600">Job Recommendations</h3>
                </div>
                <p class="text-gray-700">Discover job opportunities that align with your MBTI type.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <i class="fas fa-cogs text-green-600 text-4xl mr-4"></i>
                    <h3 class="text-2xl font-bold text-green-600">Personalized Rules</h3>
                </div>
                <p class="text-gray-700">Set preferences and rules to tailor the app's recommendations to your needs.</p>
            </div>
        </div>
    </div>

    <footer class="bg-green-600 text-white text-center py-6 mt-16">
        <p class="text-sm">&copy; 2025 MBTI App. All rights reserved.</p>
    </footer>

    <script>
        // Dark mode toggle logic
        const toggleDarkMode = () => {
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
</body>
</html>
