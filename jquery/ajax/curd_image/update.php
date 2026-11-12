<?php

require_once "db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $command = $_POST['command'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){

        $oldImage = $conn->query("SELECT * FROM posts WHERE id = $id")-> fetch_assoc();

        if(!empty($oldImage['image'])){
            $oldImagePath = __DIR__ . "/" . $oldImage['image'];

            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }
        }

        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $imagePath = "uploads/" . time() ."_". $image_name;

        $filePath = __DIR__ . "/" . $imagePath;

        move_uploaded_file($tmp_name, $filePath);
       
            $update = $conn->query("UPDATE posts SET title='$title',
                                                 command = '$command',
                                                 image = '$imagePath'
                                                 WHERE id = $id"); 
           
    }else{

        $update = $conn->query("UPDATE posts SET title= '$title',
                                                 command= '$command'
                                                 WHERE id = $id");
                                                         
    }
}

?>



