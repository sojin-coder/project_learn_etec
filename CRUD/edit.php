<?php
   require_once './config/db.php';
   $id = $_GET['id'] ?? "";
   if(!$id || !filter_var($id, FILTER_VALIDATE_INT)){
      header("Location: index.php");
      exit;
   }

   $result = $conn->query("SELECT * FROM products WHERE id = $id");

   if($result->num_rows ===0){
      header("Location: index.php");
      exit;
   }
   $product = $result->fetch_assoc();
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #cbd5e1;
            --radius: 8px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-card {
            background: var(--card-bg);
            width: 100%;
            max-width: 450px;
            padding: 32px;
            border-radius: var(--radius);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 24px;
            color: var(--text-main);
            text-align: center;
            letter-spacing: -0.025em;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px 14px;
            font-size: 0.95rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            outline: none;
            transition: all 0.2s ease;
            background-color: #fff;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: var(--primary-hover);
        }
    </style>
</head>

<body>

    <div class="form-card">
               <h1>Edit Product</h1>
       
               <form action="Process_edit.php" method="post">
       
           <input
               type="hidden"
               name="id"
               value="<?= $product['id'] ?>"
           >
       
           <div class="form-group">
                <label for="title">Title</label>
        
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="<?= htmlspecialchars($product['title']) ?>"
                    placeholder="e.g. Wireless Mouse"
                    required
                >
            </div>
        
            <div class="form-group">
                <label for="price">Price</label>
        
                <input
                    type="number"
                    id="price"
                    name="price"
                    step="0.01"
                    value="<?= htmlspecialchars($product['price']) ?>"
                    placeholder="e.g. 29.99"
                    required
                >
            </div>
        
            <div class="form-group">
                <label for="qty">Quantity</label>
        
                <input
                    type="number"
                    id="qty"
                    name="qty"
                    value="<?= htmlspecialchars($product['qty']) ?>"
                    placeholder="e.g. 10"
                    required
                >
            </div>
        
            <div class="form-group">
                <label for="des">Description</label>
        
                <input
                    type="text"
                    id="des"
                    name="des"
                    value="<?= htmlspecialchars($product['descript']) ?>"
                    placeholder="Product details..."
                >
            </div>
        
            <button type="submit">
                Update Product
            </button>
        
        </form>
    </div>

</body>

</html>