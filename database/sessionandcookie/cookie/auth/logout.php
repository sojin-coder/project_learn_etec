<?php

    setcookie('user_id', $user['id'], time() - 60, '/');
    setcookie('username', $user['username'], time() - 60, '/');
    setcookie('role', $user['roles'], time() - 60, '/');

    header('location: login.php');
    