<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hospital HMS - Sign Up</title>
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
      <h1 class="text-3xl font-bold text-gray-900 mb-2">Create Your Account</h1>
    </div>

    <form id="signupForm">
      <div class="mb-6">
        <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Full Name</label>
        <input type="text" id="name" name="name"
               class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:outline-none focus:border-indigo-500 transition-colors duration-200"
               required>
      </div>

      <div class="mb-6">
        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
        <input type="email" id="email" name="email"
               class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:outline-none focus:border-indigo-500 transition-colors duration-200"
               required>
      </div>

      <div class="mb-6">
        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
        <input type="password" id="password" name="password"
               class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:outline-none focus:border-indigo-500 transition-colors duration-200"
               required minlength="6">
      </div>

      <div class="mb-6">
        <label for="confirm-password" class="block text-gray-700 text-sm font-semibold mb-2">Confirm Password</label>
        <input type="password" id="confirm-password" name="password_confirmation"
               class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:outline-none focus:border-indigo-500 transition-colors duration-200"
               required>
      </div>

      <button type="submit"
              class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold text-lg hover:bg-indigo-700 transition-colors duration-200 shadow-lg transform hover:scale-105">
        Sign Up
      </button>
    </form>

    <div class="mt-8 text-center text-gray-600">
      Already have an account?
      <a href="/" class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-200">Login Here</a>
    </div>
  </div>

  <script>
    const form = document.getElementById('signupForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm-password');

    form.addEventListener('submit', async function (event) {
      event.preventDefault();

      if (password.value !== confirmPassword.value) {
        confirmPassword.setCustomValidity("Passwords don't match.");
        confirmPassword.reportValidity();
        return;
      } else {
        confirmPassword.setCustomValidity('');
      }

      const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        password: password.value,
        password_confirmation: confirmPassword.value
      };

      try {
        const response = await fetch("/signup", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify(formData)
        });

        const result = await response.json();

        if (response.ok) {
          alert("Signup successful!");
          window.location.href = "/";
        } else {
          alert(result.message || "Signup failed.");
        }

      } catch (error) {
        alert("Something went wrong. Please try again.");
        console.error(error);
      }
    });

    confirmPassword.addEventListener('input', function () {
      if (password.value === confirmPassword.value) {
        confirmPassword.setCustomValidity('');
      }
    });
  </script>

</body>
</html>
