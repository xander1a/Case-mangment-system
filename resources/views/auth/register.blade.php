<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Name</label>
                <input type="text" name="name" required class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" required class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Password</label>
                <input type="password" name="password" required class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Role</label>
                <select name="role" class="w-full border rounded p-2" required>
                    <option value="admin">Admin</option>
                    <option value="investigator">Investigator</option>
                    <option value="doctor">Doctor</option>
                    <option value="counselor">Counselor</option>
                    <option value="legal_officer">Legal Officer</option>
                    <option value="gbv_officer">GBV Officer</option>
                    <option value="social_worker">Social Worker</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Register</button>
        </form>
    </div>
</body>
</html>
