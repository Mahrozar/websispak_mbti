<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBTI Job Recommendation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-blue-600 text-center mb-4">MBTI Job Recommendation</h1>
        <form action="/recommendation" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="mbti_type" class="block text-sm font-medium text-gray-700">Select Your MBTI Type:</label>
                <select name="mbti_type" id="mbti_type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">-- Select MBTI Type --</option>
                    <option value="INTJ">INTJ</option>
                    <option value="ENTP">ENTP</option>
                    <option value="INFJ">INFJ</option>
                    <option value="ENFP">ENFP</option>
                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                </select>
            </div>
            <div>
                <label for="range" class="block text-sm font-medium text-gray-700">Rate Yourself (1-5):</label>
                <input type="range" name="range" id="range" min="1" max="5" step="1" value="3" class="mt-1 block w-full">
                <div class="text-center mt-2">
                    <span id="rangeValue" class="text-blue-600 font-bold">3</span>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Get Recommendation</button>
        </form>

        <!-- Tombol Login -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Already have an account?</p>
            <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login</a>
        </div>
    </div>

    <script>
        const rangeInput = document.getElementById('range');
        const rangeValue = document.getElementById('rangeValue');
        rangeInput.addEventListener('input', () => {
            rangeValue.textContent = rangeInput.value;
        });
    </script>
</body>
</html>
