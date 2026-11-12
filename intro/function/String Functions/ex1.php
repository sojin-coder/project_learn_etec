<?php

$products = [
    [
        "name" => "MacBook Pro",
        "image" => "img1.jpg",
        "original_price" => 1500,
        "discount" => 10 
    ],
    [
        "name" => "iPhone 15",
        "image" => "img2.jpg",
        "original_price" => 999,
        "discount" => 15 
    ],
    [
        "name" => "Samsung S24",
        "image" => "img3.jpg",
        "original_price" => 899,
        "discount" => 20 
    ],
    [
        "name" => "Gaming Headset",
        "image" => "img4.jpg",
        "original_price" => 120,
        "discount" => 25 
    ],
    [
        "name" => "Keyboard",
        "image" => "img5.jpg",
        "original_price" => 100,
        "discount" => 20 
    ],
    [
        "name" => "Mouse",
        "image" => "img6.jpg",
        "original_price" => 50,
        "discount" => 15 
    ],
    [
        "name" => "USB",
        "image" => "img7.jpg",
        "original_price" => 25,
        "discount" => 20 
    ],
    [
        "name" => "CPU",
        "image" => "img8.jpg",
        "original_price" => 120,
        "discount" => 10
    ]
];


function calculateDiscountPrice($original, $dis) {
    $discounted = $original - ($original * ($dis / 100));
    
    return $discounted;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop - Assignment</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
        }

        /* Navbar Styling */
        header {
            background-color: #1a1e29;
            color: #fff;
            padding: 15px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo {
            font-size: 22px;
            font-weight: bold;
        }

        header nav a {
            color: #a0a5b1;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
            transition: color 0.3s;
        }

        header nav a:hover, header nav a.active {
            color: #fff;
        }

        /* Container styling */
        .container {
            width: 84%;
            margin: 30px auto;
        }

        /* Hero Banner */
        .hero-banner {
            background-color: #0d6efd;
            color: white;
            padding: 40px 35px;
            border-radius: 8px;
            margin-bottom: 40px;
        }

        .hero-banner h1 {
            font-size: 32px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .hero-banner p {
            font-size: 15px;
            opacity: 0.9;
        }

     
        .section-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
            color: #222;
        }

       
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

      
        .product-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            position: relative;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            border: 1px solid #eef1f6;
        }

        .discount-tag {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: #ff0000;
            color: white;
            font-size: 11px;
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 20px;
            z-index: 10;
        }

        .product-image {
            width: 100%;
            height: 160px;
            object-fit: contain;
            margin-bottom: 15px;
        }

        .product-name {
            font-size: 17px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .product-price {
            margin-bottom: 15px;
            font-size: 14px;
        }

        .old-price {
            text-decoration: line-through;
            color: #888;
            margin-right: 8px;
        }

        .new-price {
            color: #2e7d32;
            font-weight: bold;
        }

     
        .card-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .btn {
            padding: 8px 14px;
            font-size: 13px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            transition: background 0.2s;
            font-weight: 500;
        }

        .btn-buy {
            background-color: #0d6efd;
            color: white;
        }

        .btn-buy:hover {
            background-color: #0b5ed7;
        }

        .btn-view {
            background-color: #fff;
            color: #444;
            border: 1px solid #ccc;
        }

        .btn-view:hover {
            background-color: #f8f9fa;
        }

        footer {
            background-color: #1a1e29;
            color: #a0a5b1;
            padding: 50px 8% 20px 8%;
            font-size: 14px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 2fr;
            gap: 40px;
            padding-bottom: 30px;
        }

        .footer-col h3 {
            color: #fff;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .footer-col p {
            line-height: 1.6;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            color: #a0a5b1;
            text-decoration: none;
        }

        .footer-col ul li a:hover {
            color: #fff;
        }

        .footer-bottom {
            border-top: 1px solid #2d3243;
            padding-top: 20px;
            text-align: center;
            font-size: 13px;
        }
    </style>
</head>
<body>

   
    <header>
        <div class="logo">MyShop</div>
        <nav>
            <a href="#" class="active">Home</a>
            <a href="#">Products</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <div class="container">
     
        <div class="hero-banner">
            <h1>Welcome to MyShop</h1>
            <p>Find the best products with amazing discounts</p>
        </div>

   
        <h2 class="section-title">Featured Products</h2>

      
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <?php 
                 
                    $discountedPrice = calculateDiscountPrice($product['original_price'], $product['discount']);
                ?>
                <div class="product-card">
                  
                    <div class="discount-tag">-<?= $product['discount']; ?>%</div>
                    
                  
                    <img src="image/<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="product-image">
                    
                   
                    <div class="product-name"><?= $product['name']; ?></div>
                    <div class="product-price">
                        <span class="old-price">$<?= $product['original_price']; ?></span>
                        <span class="new-price">$<?= $discountedPrice; ?></span>
                    </div>
                    
                 
                    <div class="card-buttons">
                        <button class="btn btn-buy">Buy Now</button>
                        <button class="btn btn-view">View</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

   
    <footer>
        <div class="footer-grid">
            <div class="footer-col">
                <h3>MyShop</h3>
                <p>Best online shop for modern products.</p>
            </div>
            <div class="footer-col">
                <h3>Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Contact</h3>
                <p>Email: support@myshop.com</p>
                <p style="margin-top: 10px;">Phone: +855 123 456 789</p>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2026 MyShop. All rights reserved.
        </div>
    </footer>

</body>
</html>