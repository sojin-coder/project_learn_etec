
<?php

require_once "db.php";

$id = $_POST['id'] ?? '';

if (!$id) {
    echo "ID not found";
    exit;
}

$result = $conn->query("SELECT * FROM posts WHERE id = $id");

if (!$result || $result->num_rows === 0) {
    echo "Post not found";
    exit;
}

$product = $result->fetch_assoc();

?>

<main>

    <form
        id="formUpdate"
        enctype="multipart/form-data"
        onsubmit="updatePost(this)"
    >

        <h1>Form Update</h1>

        <input
            type="hidden"
            name="id"
            value="<?= $product['id'] ?>"
        >

        <input
            type="text"
            name="title"
            value="<?= htmlspecialchars($product['title']) ?>"
            placeholder="title"
        >

        <br>

        <input
            type="text"
            name="command"
            value="<?= htmlspecialchars($product['command']) ?>"
            placeholder="command"
        >

        <br>

        <input
            type="file"
            name="image"
            id="image_preview"
        >

        <br>

        <img
            id="preview"
            width="100px"
            src="<?= htmlspecialchars($product['image']) ?>"
        >

        <br>

        <button type="submit">
            Update
        </button>

    </form>

</main>

<script>

$('#image_preview').on('change', function () {

    previewImage(this, "#preview");

});

</script>

