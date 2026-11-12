<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>

        .btn-edit {
            display: inline-block;
            padding: 6px 14px;
            background-color: #0e1ce2;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 13px;
        }
        .btn-view {
            display: inline-block;
            padding: 6px 14px;
            background-color: #10b981;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 13px;
        }
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
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-bottom: 24px;
            color: #1a252f;
            font-size: 28px;
            font-weight: 600;
        }

        table {
            width: 100%;
            max-width: 1100px;
            border-collapse: collapse;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: none !important;
        }

        thead {
            background-color: #2c3e50;
            color: #ffffff;
        }

        th {
            padding: 14px 16px;
            text-align: left;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid #eef2f5;
            vertical-align: middle;
            font-size: 14px;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background-color: #f8fafc;
        }

        img {
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            display: block;
        }

        button {
            padding: 6px 14px;
            margin-right: 4px;
            border: none;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease, opacity 0.2s ease;
        }

        button:first-child {
            background-color: #3b82f6;
            color: #ffffff;
        }

        button:first-child:hover {
            background-color: #2563eb;
        }

        button:last-child {
            background-color: #ef4444;
            color: #ffffff;
        }

        button:last-child:hover {
            background-color: #dc2626;
        }
    </style>
</head>

<body>

    <h1>Products</h1>
    <form action="<?= BASE_URL ?>/" method="GET">

        <div class="search_input">
    
            <input
                type="text"
                name="search"
                placeholder="Search what you want ..."
                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
            >
    
            <button type="submit">
                Search
            </button>
    
        </div>
    
    </form>
    <a href="<?= BASE_URL ?>/products/create">+ Add Product</a> 

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
       
        <tbody>
        
            <?php if (empty($products)): ?>
        
                <tr>
                    <td colspan="7" style="text-align: center; padding: 30px;">
                        Product not found
                    </td>
                </tr>
        
            <?php else: ?>
        
                <?php foreach ($products as $product): ?>
        
                    <tr>
        
                        <td>
                            <?= htmlspecialchars($product['id']) ?>
                        </td>
        
                        <td>
        
                            <?php if (!empty($product['image'])): ?>
        
                                <img
                                    src="<?= BASE_URL ?>/assets/uploads/<?= htmlspecialchars($product['image']) ?>"
                                    width="80"
                                    height="80"
                                    alt="<?= htmlspecialchars($product['name']) ?>"
                                >
        
                            <?php else: ?>
        
                                No Image
        
                            <?php endif; ?>
        
                        </td>
        
                        <td>
                            <?= htmlspecialchars($product['name']) ?>
                        </td>
        
                        <td>
                            <?= htmlspecialchars($product['description'] ?? '') ?>
                        </td>
        
                        <td>
                            <?= number_format($product['price'], 2) ?>
                        </td>
        
                        <td>
                            <?= htmlspecialchars($product['stock']) ?>
                        </td>
        
                        <td>
        
                            <a
                                href="<?= BASE_URL ?>/products/edit?id=<?= $product['id'] ?>"
                                class="btn-edit"
                            >
                                Edit
                            </a>
        
                            <a
                                href="<?= BASE_URL ?>/products/show?id=<?= $product['id'] ?>"
                                class="btn-view"
                            >
                                View
                            </a>
        
                            <form
                                action="<?= BASE_URL ?>/products/destroy?id=<?= $product['id'] ?>"
                                method="POST"
                            >
                                <button type="submit">
                                    Delete
                                </button>
                            </form>
        
                        </td>
        
                    </tr>
        
                <?php endforeach; ?>
        
            <?php endif; ?>
        
        </tbody>


    </table>

</body>

</html>