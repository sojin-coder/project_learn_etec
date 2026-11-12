<?php
    require_once "db.php";
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST['title'];
        $command = $_POST['command'];

        $imagePath = null;
        
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $image_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $imagePath = "uploads/" . time() . '_' . $image_name;
            move_uploaded_file($tmp_name, $imagePath);
        }

        $insert = $conn->query("INSERT INTO posts (title, command, image) 
                                VALUES ('$title', '$command', '$imagePath')");

        if($insert){
            setcookie('success', "Create Successfully", time()+10, '/');
           
           
        }               
     
    } 

    // '/' setcookie have this it make know fild everything
    // UPLOAD_ERR_OK​​ ផ្ទៀងផ្ទាត់ថាតើគ្មាន Error: UPLOAD_ERR_OK គឺជា Constant របស់ PHP 
    // ដែលមានតម្លៃស្មើ 0។ វាបញ្ជាក់ថា File ត្រូវបាន Upload មកកាន់ Server ដោយជោគជ័យ ១០០% និងគ្មានបញ្ហាអ្វីទាំងអស់



?>



