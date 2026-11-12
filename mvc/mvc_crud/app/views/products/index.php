<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
        table { width: 50%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h2>បញ្ជីទំនិញ (Product List)</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['title']); ?></td>
                    <td>$<?= htmlspecialchars($product['price']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>