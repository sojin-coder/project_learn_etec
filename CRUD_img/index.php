
<?php

require_once "./config/db.php";

$products = $conn->query("SELECT * FROM products ORDER BY id DESC");

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Management</title>

    <style>

        .product-image {
             width: 65px;
             height: 65px;
             object-fit: cover;
             border-radius: 8px;
             border: 1px solid var(--border);
             background: #f8fafc;
             cursor: pointer;
             transition: 0.2s;
         }
         
         .product-image:hover {
             transform: scale(1.05);
         }
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --danger: #ef4444;
            --danger-hover: #dc2626;

            --bg: #f8fafc;
            --card: #ffffff;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;

            --radius: 10px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Oxygen,
                Ubuntu,
                Cantarell,
                sans-serif;

            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
        }

        /* Header */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .page-header p {
            margin-top: 5px;
            color: var(--muted);
            font-size: 14px;
        }

        .add-btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .add-btn:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
        }

        /* Table Card */

        .table-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow:
                0 4px 6px -1px rgba(0, 0, 0, 0.05),
                0 10px 20px -5px rgba(0, 0, 0, 0.05);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        /* Table Header */

        thead {
            background: #f8fafc;
        }

        th {
            padding: 15px 18px;
            text-align: left;

            font-size: 12px;
            font-weight: 700;

            color: var(--muted);

            text-transform: uppercase;
            letter-spacing: 0.05em;

            border-bottom: 1px solid var(--border);
        }

        /* Table Body */

        td {
            padding: 16px 18px;

            font-size: 14px;
            color: #334155;

            border-bottom: 1px solid #f1f5f9;

            vertical-align: middle;
        }

        tbody tr {
            transition: background 0.15s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* ID */

        td:first-child {
            font-weight: 600;
            color: var(--muted);
        }

        /* Product Title */

        .product-title {
            font-weight: 600;
            color: var(--text);
        }

        /* Price */

        .price {
            font-weight: 600;
            color: #16a34a;
        }

        /* Quantity */

        .qty {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 40px;
            padding: 5px 9px;

            background: #f1f5f9;
            border-radius: 6px;

            font-size: 13px;
            font-weight: 600;
        }

        /* Image */

        .product-image {
            width: 65px;
            height: 65px;

            object-fit: cover;

            border-radius: 8px;

            border: 1px solid var(--border);

            background: #f8fafc;
        }

        /* Description */

        .description {
            max-width: 250px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;

            color: var(--muted);
        }

        /* Actions */

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .action-btn {
            display: inline-block;

            padding: 7px 11px;

            border-radius: 6px;

            font-size: 13px;
            font-weight: 600;

            text-decoration: none;

            transition: 0.2s;
        }

        .view-btn {
            color: #475569;
            background: #f1f5f9;
        }

        .view-btn:hover {
            background: #e2e8f0;
        }

        .edit-btn {
            color: var(--primary);
            background: #eef2ff;
        }

        .edit-btn:hover {
            background: #e0e7ff;
        }

        .delete-btn {
            color: var(--danger);
            background: #fef2f2;
        }

        .delete-btn:hover {
            background: #fee2e2;
        }

        /* Empty State */

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: var(--muted);
        }

        /* Responsive */

        @media (max-width: 768px) {

            body {
                padding: 25px 12px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .add-btn {
                width: 100%;
                text-align: center;
            }

            .table-card {
                border-radius: 8px;
            }
        }
    </style>

</head>

<body>

    <div class="container">


        <div class="page-header">
            <?php if (isset($_COOKIE['success'])): ?>
    <p><?= htmlspecialchars($_COOKIE['success']) ?></p>
    <?php endif; ?>
    
    <?php if (isset($_COOKIE['update_success'])): ?>
        <p><?= htmlspecialchars($_COOKIE['update_success']) ?></p>
    <?php endif; ?>
    <?php if (isset($_COOKIE['delete_success'])): ?>
        <p><?= htmlspecialchars($_COOKIE['delete_success']) ?></p>
    <?php endif; ?>

            <div>
                <h1>Products</h1>
                <p>Manage your products and inventory</p>
            </div>

            <a href="./create.php" class="add-btn">
                + Add Product
            </a>

        </div>


        <!-- Table -->

        <div class="table-card">

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>

                    </thead>


                    <tbody>

                        <?php if ($products && $products->num_rows > 0): ?>

                            <?php while ($product = $products->fetch_assoc()): ?>

                                <tr>

                                    <!-- ID -->

                                    <td>
                                        #<?= $product['id'] ?>
                                    </td>


                                    <!-- Title -->

                                    <td>
                                        <div class="product-title">
                                            <?= htmlspecialchars($product['title']) ?>
                                        </div>
                                    </td>


                                    <!-- Price -->

                                    <td>
                                        <span class="price">
                                            $<?= number_format($product['price'], 2) ?>
                                        </span>
                                    </td>


                                    <!-- Quantity -->

                                    <td>
                                        <span class="qty">
                                            <?= $product['qty'] ?>
                                        </span>
                                    </td>


                                    <!-- Image -->

                                    <td>

                                       <img
                                            src="<?= $product['image'] ?>"
                                            alt="<?= htmlspecialchars($product['title']) ?>"
                                            class="product-image"
                                           
                                        >

                                    </td>
                                    <td>

                                        <div class="description">
                                            <?= htmlspecialchars($product['description']) ?>
                                        </div>

                                    </td>

                                    <td>

                                        <div class="actions">

                                            <a href="./show.php?id=<?= $product['id'] ?>"  class="action-btn view-btn" >
                                                View
                                            </a>

                                            <a href="./edit.php?id=<?= $product['id'] ?>" class="action-btn edit-btn"
                                            >
                                                Edit
                                            </a>

                                            <a
                                                href="./delete.php?id=<?= $product['id'] ?>"
                                                class="action-btn delete-btn"
                                                onclick="return confirm('Are you sure you want to delete this product?')"
                                            >
                                                Delete
                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            <?php endwhile; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="7">

                                    <div class="empty">
                                        No products found.
                                    </div>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>

