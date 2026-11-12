<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($product['name']) ?>
    </title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        .product-detail {
            display: flex;
            gap: 40px;
        }

        .product-image {
            width: 450px;
        }

        .product-image img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 10px;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .price {
            font-size: 26px;
            color: #e63946;
            margin-bottom: 20px;
        }

        .description {
            line-height: 1.7;
            color: #555;
        }

        .stock {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background: #222;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            background: #444;
        }


        .actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }
        
        .btn-buy,
        .btn-back {
            display: inline-block;
            padding: 12px 22px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 15px;
        }
        
        .btn-buy {
            background: #111827;
            color: white;
        }
        
        .btn-buy:hover {
            background: #374151;
        }
        
        .btn-back {
            background: #e5e7eb;
            color: #111827;
        }
        
        .btn-back:hover {
            background: #d1d5db;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="product-detail">

            <!-- Image -->
            <div class="product-image">

                <?php if (!empty($product['image'])): ?>

                    <img
                        src="<?= BASE_URL ?>/assets/uploads/<?= htmlspecialchars($product['image']) ?>"
                        alt="<?= htmlspecialchars($product['name']) ?>"
                    >

                <?php else: ?>

                    <div>
                        No Image
                    </div>

                <?php endif; ?>

            </div>


            <!-- Product Info -->
            <div class="product-info">

                <h1 class="product-name">
                    <?= htmlspecialchars($product['name']) ?>
                </h1>

                <div class="price">
                    $<?= number_format($product['price'], 2) ?>
                </div>

                <div class="description">

                    <h3>Description</h3>

                    <p>
                        <?= htmlspecialchars($product['description'] ?? '') ?>
                    </p>

                </div>

                <div class="stock">

                    <?php if ($product['stock'] > 0): ?>

                        <strong>
                            In Stock:
                        </strong>

                        <?= htmlspecialchars($product['stock']) ?>

                    <?php else: ?>

                        <strong>
                            Out of Stock
                        </strong>

                    <?php endif; ?>

                </div>

                <div class="actions">

                    <a
                        href="<?= BASE_URL ?>/customer/checkout?id=<?= $product['id'] ?>"
                        class="btn-buy"
                    >
                        Buy Now
                    </a>
                
                    <a
                        href="<?= BASE_URL ?>/customer/products"
                        class="btn-back"
                    >
                        ← Back to Products
                    </a>
                
                </div>

            </div>

        </div>

    </div>

</body>

</html>