<?php
   require 'db.php';

   $result = $conn->query("INSERT INTO students (student_name,student_phone)
                                     value ('pisey',02345678)");
        header("location:index.php");
        exit;

?>