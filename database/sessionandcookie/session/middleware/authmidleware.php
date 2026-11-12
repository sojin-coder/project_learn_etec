<?php

function requireLogin(){
    if(!$_SESSION['user_id']){
        header('location: ../auth/login.php');
    }
}

function requireAdmin(){
    if($_SESSION['role'] != "admin"){
        header('location: ../auth/login.php');
    }
}

function requireClient(){


    if($_SESSION['role'] != 'client' and $_COOKIE['role'] != 'admin'){
        header('location: ../auth/login.php');
    }
}

?>