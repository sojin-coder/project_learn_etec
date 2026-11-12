<?php
require_once 'db.php';

$result = $conn->query("DELETE FROM students WHERE student_name = 'pisey' ");

header("location:index.php");
        exit;

?>

<!-- <?php

    require_once "db.php";
    
    if (isset($_GET['id'])) {
    
        $id = (int) $_GET['id'];
    
        $delete = $conn->query(
            "DELETE FROM students WHERE student_id = $id"
        );
    
        if ($delete) {
            header("Location: index.php");
            exit;
        } else {
            echo "Delete failed: " . $conn->error;
        }
    
    } else {
        echo "ID not found";
    }

?> -->