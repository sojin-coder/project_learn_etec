<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Products</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .logo ul{
            display: flex;
            gap: 20%;
            margin: 40px;

        }
        .logo ul li:hover {
           background: #eb18c8;
           padding: 10px;
        }
        li {
            list-style: none;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        h1 {
            margin-bottom: 30px;
            text-align:center;
            font-size:40px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .product-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-name {
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .price {
            margin-top: 8px;
            color: #3b82f6;
            font-size: 18px;
            font-weight: bold;
        }

        .btn-view {
            display: block;
            margin-top: 15px;
            padding: 10px;
            background: #3b82f6;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
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
    <div class="navbar">
        <div class="logo">
            <ul>
                <li>Home</li>
                <li>About</li>
                <li>Product</li>
                <li>Contant</li>
                <li>discout</li>
            </ul>
        </div>
    </div>

    <h1 >Our Products</h1>

    <div class="products">

        <?php foreach ($products as $product): ?>

            <div class="product-card">

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


                <div class="product-name">
                    <?= htmlspecialchars($product['name']) ?>
                </div>


                <div class="price">
                    $<?= number_format($product['price'], 2) ?>
                </div>

                <div class="actions">
                <a
                    href="<?= BASE_URL ?>/customer/product?id=<?= $product['id'] ?>" class="btn-view"
                >
                    View Product
                </a>
                <a
                    href="<?= BASE_URL ?>/customer/checkout?id=<?= $product['id'] ?>"
                    class="btn-buy"
                >
                    Buy Now
                </a>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>

</body>

</html>