<?php


require_once "db.php";
$id = $_GET['id'];
$update = $conn->query("UPDATE students SET student_name = 'New student',
                            student_phone =012345678 
                            
                            WHERE student_id = $id");

if($update){
    header('location: index.php');
}


?>