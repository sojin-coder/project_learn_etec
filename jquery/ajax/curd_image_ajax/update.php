<?php

require_once './db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
 
    $id = $_POST['id'] ?? '';
    $title = $_POST['title'] ?? '';
    $command = $_POST['command'] ?? '';
    
   
    if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
        echo "Invalid ID";
        exit;
    }
    
  
    if (empty($title) || empty($command)) {
        echo "Title and command are required";
        exit;
    }
    
   
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        
       
        $new_image_name = time() . "_" . $image_name;
        
        
        $path = "uploads/" . $new_image_name;
        
        
        if (move_uploaded_file($tmp_name, $path)) {
           
            $image_query = ", image='$new_image_name'";
        } else {
            echo "Image upload failed";
            exit;
        }
    } else {
        $image_query = ""; 
    }
    
   
    $query = "UPDATE posts SET title='$title', command='$command' $image_query WHERE id=$id";
    $result = $conn->query($query);
    
    if ($result) {
        setcookie(
            'update_success',
            'Update post successfully',
            time() + 10,
            '/'
            );
            echo "Update successful";
    } else {
        echo "Update failed: " . $conn->error;
    }
}
?>