<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>


<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 font-sans">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">

        <!-- Success Message -->
        <?php if (isset($_SESSION['success'])): ?>

            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                <?= htmlspecialchars($_SESSION['success']) ?>
            </div>

            <?php unset($_SESSION['success']); ?>

        <?php endif; ?>


        <!-- Error Message -->
        <?php if (isset($_SESSION['error'])): ?>

            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
                <?= htmlspecialchars($_SESSION['error']) ?>
            </div>

            <?php unset($_SESSION['error']); ?>

        <?php endif; ?>


        <form
            action="../controller/authController.php"
            method="post"
            class="space-y-5"
        >

            <h1 class="text-2xl font-bold text-center text-gray-800 mb-2">
                Login Form
            </h1>


            <!-- Email -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150"
                >

            </div>


            <!-- Password -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150"
                >

            </div>


            <!-- Login Button -->
            <button
                type="submit"
                name="login"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg shadow transition duration-200 cursor-pointer"
            >
                Login
            </button>

        </form>


        <!-- Register -->
        <div class="mt-6 text-center text-sm text-gray-600 border-t border-gray-100 pt-4">

            Don't have an account?

            <a
                href="register.php"
                class="text-blue-600 hover:underline font-medium"
            >
                Register
            </a>

        </div>

    </div>

</body>

</html>