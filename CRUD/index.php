<?php

    require_once './config/db.php';
    
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    
    if (!$result) {
        die("Query Error: " . $conn->error);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products List</title>
<style>
   
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 30px;
        color: #333333;
    }

  
    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }


    p:empty {
        display: none;
    }
    
    p {
        max-width: 90%;
        margin: 0 auto 15px auto;
        padding: 10px 15px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 4px;
        text-align: center;
    }

    .add {
        width: 90%;
        margin: 0 auto 15px auto;
        text-align: right;
    }

  
    .btn-add {
        background-color: #28a745;
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
        display: inline-block;
    }

    .btn-add:hover {
        background-color: #218838;
    }

 
    table {
        width: 90%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

  
    th {
        background-color: #007bff;
        color: white;
        padding: 12px;
        text-align: left;
        border: 1px solid #dee2e6;
        font-size: 14px;
        text-transform: uppercase;
    }

   
    td {
        padding: 10px 12px;
        border: 1px solid #dee2e6;
        font-size: 14px;
        vertical-align: middle;
    }

   
    tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    tr:hover {
        background-color: #e9ecef;
    }

    
    .btn-edit, .btn-delete {
        padding: 6px 12px;
        text-decoration: none;
        color: white;
        border-radius: 3px;
        font-size: 13px;
        display: inline-block;
    }

    .btn-edit {
        background-color: #ffc107;
        color: #212529;
        margin-right: 5px;
    }

    .btn-edit:hover {
        background-color: #e0a800;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }
    .product-image {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 6px;
    display: block;
}
</style>

</head>

<body>
  
     <?php if (isset($_COOKIE['success'])): ?>
    <p><?= htmlspecialchars($_COOKIE['success']) ?></p>
    <?php endif; ?>
    
    <?php if (isset($_COOKIE['update_success'])): ?>
        <p><?= htmlspecialchars($_COOKIE['update_success']) ?></p>
    <?php endif; ?>
    <?php if (isset($_COOKIE['delete_success'])): ?>
        <p><?= htmlspecialchars($_COOKIE['delete_success']) ?></p>
    <?php endif; ?>
    <h2>Product Inventory</h2>
    <div class="add">
        <a href="create.php" class= "btn-add">Add</a>
    </div>

    <table >

        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Description</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>

    <?php while ($product = $result->fetch_assoc()): ?>

        <tr>

            <td>
                <?= htmlspecialchars($product['id']); ?>
            </td>

            
            <td>
                <img 
                    src="<?= htmlspecialchars($product['image']); ?>" 
                    alt="<?= htmlspecialchars($product['title']); ?>"
                    class="product-image"
                >
            </td>

            <td>
                <?= htmlspecialchars($product['title']); ?>
            </td>

            <td>
                $<?= number_format($product['price'], 2); ?>
            </td>

            <td>
                <?= htmlspecialchars($product['qty']); ?>
            </td>

            <td>
                <?= htmlspecialchars($product['descript']); ?>
            </td>

            <td>
                <a href="edit.php?id=<?= $product['id'] ?>" class="btn-edit">Edit</a>
                <a href="delete.php?id=<?= $product['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this product?');">
                    Delete
                </a>
            </td>

        </tr>

    <?php endwhile; ?>

</tbody>

    </table>

</body>

</html>