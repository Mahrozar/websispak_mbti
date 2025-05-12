<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6 text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Verify Your Email</h1>
        <p class="text-gray-600 mb-4">Before proceeding, please check your email for a verification link.</p>
        <p class="text-gray-600 mb-6">If you did not receive the email, click the button below to request another.</p>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Resend Verification Email</button>
        </form>
    </div>
</body>
</html>
