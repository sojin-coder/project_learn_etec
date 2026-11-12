
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Product</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f4f6f9;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        h1 {
            margin-bottom: 20px;
            color: #1a252f;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #3b82f6;
            text-decoration: none;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #475569;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .current-image {
            margin-bottom: 10px;
        }

        .current-image img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
        }

        button:hover {
            background: #2563eb;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Product</h1>

    <a
        href="<?= BASE_URL ?>/"
        class="back"
    >
        ← Back to Products
    </a>

    <form
        action="<?= BASE_URL ?>/products/update"
        method="POST"
        enctype="multipart/form-data"
    >

        <!-- Product ID -->
        <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars($product['id']) ?>"
        >

        <!-- Name -->
        <div class="form-group">

            <label>Name</label>

            <input
                type="text"
                name="name"
                value="<?= htmlspecialchars($product['name']) ?>"
                required
            >

        </div>


        <!-- Current Image -->
        <div class="form-group">

           

            <div class="current-image">
                <input type="file" name="image" id="imageInput" accept="image/*">
            
                <?php if (!empty($product['image'])): ?>
                    <img id="imagePreview"
                         src="<?= BASE_URL ?>/assets/uploads/<?= htmlspecialchars($product['image']) ?>"
                         alt="<?= htmlspecialchars($product['name']) ?>">
                <?php else: ?>
                    <img id="imagePreview" src="" alt="Image Preview" style="display:none;">
                    <p id="noImage">No Image</p>
                <?php endif; ?>
            </div>

        </div> 


        <!-- Description -->
        <div class="form-group">

            <label>Description</label>

            <textarea name="description"><?= htmlspecialchars($product['description'] ?? '') ?></textarea>

        </div>


        <!-- Price -->
        <div class="form-group">

            <label>Price</label>

            <input
                type="number"
                name="price"
                step="0.01"
                value="<?= htmlspecialchars($product['price']) ?>"
                required
            >

        </div>


        <!-- Stock -->
        <div class="form-group">

            <label>Stock</label>

            <input
                type="number"
                name="stock"
                value="<?= htmlspecialchars($product['stock']) ?>"
            >

        </div>


        <button type="submit">
            Update Product
        </button>

    </form>

</div>


<script>

    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (file) {

            imagePreview.src = URL.createObjectURL(file);

            imagePreview.style.display = 'block';

        }

    });

</script>

</body>
</html>

