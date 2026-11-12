<?php

    require_once './config/db.php';
     
     $id = $_GET['id'];
     
     $result = $conn->query("DELETE FROM products WHERE id = $id");

     if($result){
            setcookie('delete_success' , "Delete Product successfully", time() + 10 ,'/');
            header("Location:index.php");
            exit;
        }

     
?>