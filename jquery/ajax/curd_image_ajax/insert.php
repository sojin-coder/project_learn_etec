<?php

require_once './db.php';

$title = $_POST['title'] ?? '';
$command = $_POST['command'] ?? '';

$imageName = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

    $imageName = time() . '_' . $_FILES['image']['name'];

    $uploadPath = './uploads/' . $imageName;

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        $uploadPath
    );
}

$sql = "INSERT INTO posts (title, command, image)
        VALUES ('$title', '$command', '$imageName')";

$result = $conn->query($sql);

if ($result) {
     setcookie(
        'create_success',
        'Create post successfully',
        time() + 10,
        '/'
    );

    echo "Create post successfully";

} else {

    echo "Create post failed";
}