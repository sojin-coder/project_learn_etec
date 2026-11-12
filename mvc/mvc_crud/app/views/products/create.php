<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>

<body>

    <h1>Create Product</h1>

    <form method="POST" action="index.php?action=store">

        <div>
            <label>Name</label>

            <input type="text" name="title">
        </div>

        <br>

        <div>
            <label>Price</label>

            <input type="number" name="price">
        </div>

        <br>

        <button type="submit">
            Save
        </button>

    </form>

    <br>

    <a href="index.php">
        Back
    </a>

</body>
</html>