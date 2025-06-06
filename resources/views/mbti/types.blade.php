<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBTI Types</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-lg font-bold">MBTI App</a>
            <div class="space-x-4">
                <a href="/dashboard" class="text-white hover:underline">Dashboard</a>
                <a href="/jobs" class="text-white hover:underline">Jobs</a>
                <a href="/rules" class="text-white hover:underline">Rules</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">MBTI Types</h1>
        <p class="text-gray-700 text-center mb-6">Learn about the different MBTI personality types and their unique characteristics.</p>

        <!-- Breadcrumb -->
        <div class="container mx-auto mt-4">
            <nav class="text-sm text-gray-600">
                <ol class="list-reset flex">
                    <li><a href="/" class="text-blue-600 hover:underline">Home</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-gray-700">MBTI Types</li>
                </ol>
            </nav>
        </div>

        <!-- MBTI Types Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mbtiTypes as $type)
                        <tr class="border-b">
                            <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $type->name }}</td>
                            <td class="px-4 py-2">{{ $type->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>