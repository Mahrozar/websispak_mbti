<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Recommendations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-blue-600 text-center mb-4">Job Recommendations</h1>
        <div class="space-y-4">
            @if (!empty($recommendations))
                <ul class="space-y-4">
                    @foreach ($recommendations as $recommendation)
                        <li class="p-4 bg-blue-100 rounded-md shadow">
                            <h2 class="text-lg font-bold text-blue-700">{{ $recommendation['job'] }}</h2>
                            <p class="text-gray-700">{{ $recommendation['description'] }}</p>
                            <p class="text-sm text-gray-500">Certainty: {{ $recommendation['certainty'] }}%</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center text-gray-700">No recommendations available.</p>
            @endif
        </div>
        <div class="mt-6 text-center">
            <a href="/" class="text-blue-600 hover:underline">Back to Form</a>
        </div>
    </div>
</body>
</html>