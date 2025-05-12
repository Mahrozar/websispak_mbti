<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBTI Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-10">
        <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-8">MBTI Personality Test</h1>
        <p class="text-lg text-gray-600 text-center mb-10">Jawab pertanyaan di bawah ini untuk mengetahui tipe kepribadian MBTI Anda.</p>

        <form id="mbtiForm" action="{{ url('/test') }}" method="POST" class="space-y-8" onsubmit="return handleSubmit(event)">
            @csrf
            @foreach ($questions as $question)
                <div class="p-6 bg-gray-100 rounded-lg shadow-md">
                    <label class="block text-xl font-semibold text-gray-700 mb-4">{{ $question->question_text }}</label>
                    <div class="grid grid-cols-5 gap-4">
                        @php
                            $colors = ['red', 'orange', 'gray', 'green', 'blue'];
                            $labels = ['Sangat Tidak Setuju', 'Tidak Setuju', 'Netral', 'Setuju', 'Sangat Setuju'];
                        @endphp
                        @foreach (range(1, 5) as $i)
                            @php
                                $color = $colors[$i - 1];
                                $labelText = $labels[$i - 1];
                            @endphp
                            <label class="flex flex-col items-center group">
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $i }}" class="hidden" onchange="selectOption(this, '{{ $color }}')">
                                <span class="option-btn w-10 h-10 flex items-center justify-center bg-{{ $color }}-500 text-white font-bold rounded-full cursor-pointer transition transform border-2 border-transparent group-hover:scale-110">
                                    {{ $i }}
                                </span>
                                <span class="text-sm mt-2">{{ $labelText }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="text-center mt-10">
                <button id="submitBtn" type="submit" class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-8 py-4 rounded-lg text-lg font-bold shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-green-300 transition duration-200">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <script>
        function handleSubmit(event) {
            event.preventDefault();
            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="animate-spin mr-2 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>
                Loading...
            `;
            btn.classList.add("cursor-not-allowed", "opacity-70");
            setTimeout(() => document.getElementById('mbtiForm').submit(), 500);
            return false;
        }

        function selectOption(input, color) {
            const parent = input.closest('.grid');
            const allOptions = parent.querySelectorAll('.option-btn');
            allOptions.forEach(el => {
                el.classList.remove('ring-4', 'ring-offset-2', 'scale-110');
                el.classList.forEach(cls => {
                    if (cls.startsWith('border-')) el.classList.remove(cls);
                });
                el.classList.add('border-transparent');
            });

            const selected = input.nextElementSibling;
            selected.classList.remove('border-transparent');
            selected.classList.add(`border-${color}-700`, 'ring-4', 'ring-offset-2', 'scale-110');
        }
    </script>
</body>
</html>
