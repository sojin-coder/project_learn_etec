<?php

require_once "../config/db.php";

// register
if(isset($_POST['register'])){
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email']);
    $password = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));
    $role = trim($_POST['role'] ?? 'client');

    $errors = [];

    if(empty($email)){
        $errors['email'] = "Email is Required.";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email is not format.';
    }


    if(empty($errors)){
        $conn->query("INSERT INTO user (username, email, pwd, roles)
                     VALUE ('$name', '$email', '$password', '$role')");
        $conn->close();
        setcookie('success', 'Register Successfully' , time() + 10, '/');
        header('location: ../auth/login.php');
        exit;
    }else{
        setcookie('email', $errors['email'], time() + 10, '/');
        header('location: ../auth/register.php');
        exit;
    }

}


// login
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $users = $conn->query("SELECT * FROM user WHERE email = '$email'");
    

    if ($users->num_rows > 0) {
        $user = $users->fetch_assoc();
        if (password_verify($password, $user['pwd'])) {
            setcookie('user_id', $user['id'], time() + 60, '/');
            setcookie('username', $user['username'], time() + 60, '/');
            setcookie('role', $user['roles'], time() + 60, '/');

            if ($user['roles'] == 'admin') {
                header('location: ../backend/index.php');
            } else {
                header('location: ../frontend/index.php');
            }
        }
    }
}

?>