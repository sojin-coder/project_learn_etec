<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/authController.php" method="post">
        <h1>Login Form</h1>
        <p><?= $_COOKIE['success'] ?? '' ?></p>
        <input type="email" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="password"><br>
        <button type="submit" name="login">submit</button>
    </form>
    <a href="register.php">register</a>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- ភ្ជាប់ Tailwind CSS តាមរយៈ CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 font-sans">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <form action="../controller/authController.php" method="post" class="space-y-5">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-2">Login Form</h1>
            
            <p><?= $_COOKIE['success'] ?? '' ?></p> <!-- add -->

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" placeholder="email" 
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" placeholder="password" 
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150">
            </div>

            <button type="submit" name="login" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg shadow transition duration-200 cursor-pointer">
                submit
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600 border-t border-gray-100 pt-4">
            Don't have an account? 
            <a href="register.php" class="text-blue-600 hover:underline font-medium">register</a>
        </div>
    </div>

</body>
</html>