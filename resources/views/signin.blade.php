<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hospital HMS - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: rgb(215, 218, 222);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md transform transition-all duration-300 hover:scale-105">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Sign In</h1>
        </div>

        <form id="loginForm">
            <div class="mb-6">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder=""
                       class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:outline-none focus:border-indigo-500 transition-colors duration-200"
                       required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder=""
                       class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:outline-none focus:border-indigo-500 transition-colors duration-200"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold text-lg hover:bg-indigo-700 transition-colors duration-200 shadow-lg transform hover:scale-105">
                Login
            </button>
        </form>

        <div class="mt-8 text-center text-gray-600">
            Don't have an account?
            <a href="/signup" class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-200">Sign Up</a>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                const response = await fetch("/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ email, password })
                });

                const result = await response.json();

                if (response.ok) {
                    alert("Login successful!");
                    window.location.href = "/dashboard";
                } else {
                    alert(result.message || "Login failed.");
                }
            } catch (error) {
                alert("Something went wrong. Please try again.");
                console.error(error);
            }
        });
    </script>
</body>
</html>
