<?php

require_once './db.php';

$id = $_POST['id'] ?? '';

if ($id == '') {
    die("ID is missing");
}

// Get old post
$result = $conn->query("SELECT * FROM posts WHERE id = $id");

if (!$result) {
    die("SELECT error: " . $conn->error);
}

$old = $result->fetch_assoc();

if (!$old) {
    die("Post not found");
}


// ==========================
// Delete Image
// ==========================

$imagePath = __DIR__ . '/uploads/' . $old['image'];

if (file_exists($imagePath)) {

    if (unlink($imagePath)) {
        echo "Image deleted successfully<br>";
    } else {
        echo "Image found but cannot delete<br>";
    }

} else {

    echo "Image not found: " . $imagePath . "<br>";

}


// ==========================
// Delete Database
// ==========================

$delete = $conn->query("DELETE FROM posts WHERE id = $id");

if ($delete) {

    echo "Post deleted successfully";

} else {

    echo "DELETE error: " . $conn->error;

}

?>