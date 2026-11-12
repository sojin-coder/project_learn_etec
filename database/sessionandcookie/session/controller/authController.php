
<?php

session_start();

require_once "../config/db.php";



// REGISTER


if(isset($_POST['register'])){

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $rawPassword = $_POST['password'] ?? '';
    $role = trim($_POST['role'] ?? 'client');

    $errors = [];


    // Validate name
    if(empty($name)){
        $errors['name'] = "Name is required.";
    }


    // Validate email
    if(empty($email)){

        $errors['email'] = "Email is required.";

    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $errors['email'] = "Email format is invalid.";
    }


    // Validate password
    if(empty($rawPassword)){
        $errors['password'] = "Password is required.";
    }


    // Check errors
    if(!empty($errors)){

        $_SESSION['error'] = $errors;

        header('Location: ../auth/register.php');
        exit;
    }


    // Hash password
    $password = password_hash(
        $rawPassword,
        PASSWORD_DEFAULT
    );


    // Insert user
    $stmt = $conn->prepare(
        "INSERT INTO user (username, email, pwd, roles)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssss",
        $name,
        $email,
        $password,
        $role
    );


    if($stmt->execute()){

        $_SESSION['success'] = "Register Successfully";

        header('Location: ../auth/login.php');
        exit;

    }else{

        $_SESSION['error'] = "Register failed.";

        header('Location: ../auth/register.php');
        exit;
    }
}



// =========================
// LOGIN
// =========================

if(isset($_POST['login'])){

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';


    // Validate
    if(empty($email) || empty($password)){

        $_SESSION['error'] = "Email and password are required.";

        header('Location: ../auth/login.php');
        exit;
    }


    // Find user
    $stmt = $conn->prepare(
        "SELECT * FROM user WHERE email = ? LIMIT 1"
    );

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $users = $stmt->get_result();


    // Email not found
    if($users->num_rows === 0){

        $_SESSION['error'] = "Email or password is incorrect.";

        header('Location: ../auth/login.php');
        exit;
    }


    // Get user
    $user = $users->fetch_assoc();


    // Verify password
    if(!password_verify($password, $user['pwd'])){

        $_SESSION['error'] = "Email or password is incorrect.";

        header('Location: ../auth/login.php');
        exit;
    }


    // =========================
    // LOGIN SUCCESS
    // =========================

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['roles'];
    $_SESSION['logged_in'] = true;


    // Redirect by role
    if($user['roles'] === 'admin'){

        header('Location: ../backend/index.php');
        exit;

    }else{

        header('Location: ../frontend/index.php');
        exit;
    }
}

?>