<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 32px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 480px;
        }

        h1 {
            color: #1a252f;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        a {
            display: inline-block;
            color: #3b82f6;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 24px;
            transition: color 0.2s ease;
        }

        a:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        form div {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            color: #1e293b;
            background-color: #ffffff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        input[type="file"] {
            padding: 8px;
            background-color: #f8fafc;
            cursor: pointer;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #10b981;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 8px;
        }

        button[type="submit"]:hover {
            background-color: #059669;
        }

        br {
            display: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Add New Product</h1>
        <a href="<?= BASE_URL ?>/">← Back to List</a>

        <form action="<?= BASE_URL ?>/products/store" method="POST" enctype="multipart/form-data">
            <div>
                <label>Name:</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Image:</label>
            
                <input
                    type="file"
                    name="image"
                    id="image"
                    accept="image/*"
                >
            
                <div id="preview-container" style="margin-top: 12px; display: none;">
                    <img
                        id="preview"
                        src=""
                        alt="Image Preview"
                        style="
                            width: 150px;
                            height: 150px;
                            object-fit: cover;
                            border-radius: 8px;
                            border: 1px solid #cbd5e1;
                        "
                    >
                </div>
            </div>

            <div>
                <label>Description:</label>
                <textarea name="description" rows="4" cols="30"></textarea>
            </div>

            <div>
                <label>Price:</label>
                <input type="number" name="price" step="0.01" required>
            </div>

            <div>
                <label>Stock:</label>
                <input type="number" name="stock" value="0">
            </div>

            <button type="submit">Save</button>
        </form>
    </div>

</body>
<script>
    const imageInput = document.getElementById('image');
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('preview-container');

    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            previewContainer.style.display = 'block';
        } else {
            preview.src = '';
            previewContainer.style.display = 'none';
        }
    });
</script>
</html>