<?php

require_once './db.php';

$id = $_GET['id'] ?? '';

if (!filter_var($id, FILTER_VALIDATE_INT)) {
    header("Location: index.php");
    exit;
}

$id = (int)$id;

$result = $conn->query("SELECT * FROM posts WHERE id = $id");

if ($result === false) {
    die("SQL ERROR: " . $conn->error);
}

$row = $result->fetch_assoc();

if (!$row) {
    die("Post with ID $id not found");
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Edit Post</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #0e0e12;
        font-family: Arial, sans-serif;
        color: #ecedee;
        min-height: 100vh;

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 1.5rem;
    }

    .create-card {
        max-width: 680px;
        width: 100%;

        background: #14141c;

        border-radius: 2.8rem;

        padding: 2.5rem 2.8rem 3rem;

        box-shadow: 0 30px 50px -18px rgba(0, 0, 0, 0.9);

        border: 1px solid #282b36;
    }

    .create-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        margin-bottom: 2rem;

        border-bottom: 1px solid #282b36;

        padding-bottom: 1.2rem;
    }

    .create-header h1 {
        font-size: 2rem;
    }

    .back-link {
        background: #252833;
        color: #cdd3e0;

        text-decoration: none;

        padding: 0.5rem 1.2rem;

        border-radius: 60px;

        border: 1px solid #363a47;
    }

    #formPost {
        display: flex;
        flex-direction: column;

        gap: 1.4rem;
    }

    #formPost input[type="text"] {
        background: #161a22;

        border: 1px solid #2b2f3b;

        border-radius: 60px;

        padding: 0.9rem 1.6rem;

        font-size: 1rem;

        color: white;

        outline: none;

        width: 100%;
    }

    #formPost input[type="text"]:focus {
        border-color: #6a7290;
    }

    .file-wrapper {
        display: flex;

        align-items: center;

        gap: 1rem;

        flex-wrap: wrap;
    }

    .file-label {
        background: #222632;

        border: 1px solid #353a48;

        border-radius: 60px;

        padding: 0.6rem 1.8rem;

        color: #c8cedd;

        cursor: pointer;
    }

    #formPost input[type="file"] {
        display: none;
    }

    #preview {
        width: 140px;

        height: 140px;

        object-fit: cover;

        border-radius: 1.2rem;

        border: 1px solid #2f3342;
    }

    .button-group {
        display: flex;

        gap: 1rem;

        margin-top: 0.6rem;
    }

    .btn-submit {
        background: #2f3446;

        border: 1px solid #474d62;

        border-radius: 60px;

        padding: 0.8rem 2.6rem;

        font-weight: 600;

        font-size: 1rem;

        color: white;

        cursor: pointer;

        flex: 1;
    }

    .btn-clear {
        background: #1f222d;

        border: 1px solid #343846;

        border-radius: 60px;

        padding: 0.8rem 2rem;

        color: #b6bdd0;

        cursor: pointer;
    }
</style>


</head>

<body>


<div class="create-card">

    <div class="create-header">

        <h1>✧ Edit Post</h1>

        <a href="./index.php" class="back-link">
            back
        </a>

    </div>


    <form id="formPost" enctype="multipart/form-data">

        <!-- ID -->
        <input
            type="hidden"
            name="id"
            value="<?= $row['id'] ?>"
        >


        <!-- Title -->
        <input
            type="text"
            name="title"
            placeholder="title"
            value="<?= htmlspecialchars($row['title']) ?>"
        >


        <!-- Command -->
        <input
            type="text"
            name="command"
            placeholder="command"
            value="<?= htmlspecialchars($row['command']) ?>"
        >


       
        <!-- Image -->
         <div class="file-wrapper">
             <label for="imageInput" class="file-label">
                 📎 choose image
             </label>
             
             <input
                 type="file"
                 name="image"
                 id="imageInput"
                 onchange="handleChange(this)"
             >
             
             <img
                 id="preview"
                 src="uploads/<?= $row['image'] ?>"
                 alt="preview"
                 style="width: 140px; height: 140px; object-fit: cover; border-radius: 1.2rem; border: 1px solid #2f3342;"
                >
         </div>


        <!-- Buttons -->
        <div class="button-group">

            <button
                type="submit"
                class="btn-submit"
            >
                ↗ Edit Post
            </button>

            <button
                type="button"
                id="clearCreateBtn"
                class="btn-clear"
            >
                ✕ clear form
            </button>

        </div>

    </form>

</div>
  <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Your API JS -->
<script src="api.js"></script>

<script>
$(document).ready(function(){
    $('#formPost').submit(function(e){
        e.preventDefault();
        updateData(); 
    });
});

// Preview new image
function handleChange(input) {
    let file = input.files[0];
    if (file) {
        let preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(file);
    }
}
</script>


</body>

</html>
