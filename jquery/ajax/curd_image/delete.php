<?php

    require_once "db.php";

    $id = $_POST['id'];
    $result = $conn->query("SELECT * FROM posts WHERE id = $id");
    $old = $result->fetch_assoc();

    if($old && file_exists($old['image'])){
        unlink($old['image']);
    }

    $delete = $conn->query(" DELETE FROM posts WHERE id = $id ");


    
?>





