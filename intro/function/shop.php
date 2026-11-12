<?php 

$products_data = [
    [
        "name" => "Pink Sports Shoes",
        "category" => "Sports",
        "price" => 49.99,
        "colors" => ["pink", "green", "purple"],
        "image" => "https://i.pinimg.com/1200x/1f/a0/f1/1fa0f152a0a6a13afe02288e65281d77.jpg"
    ],
    [
        "name" => "Green Running Shoes",
        "category" => "Running",
        "price" => 59.99,
        "colors" => ["green", "blue", "dark-blue"],
        "image" => "https://i.pinimg.com/1200x/fe/b4/f2/feb4f2b5526b9b5faa645ee1532d8755.jpg"
    ],
    [
        "name" => "Blue Casual Shoes",
        "category" => "Casual",
        "price" => 45.99,
        "colors" => ["blue", "red", "grey"],
        "image" => "https://i.pinimg.com/736x/7f/de/84/7fde84e0c2e89fb71719f9ca7ae3d325.jpg"
    ],
    [
        "name" => "White Fashion Shoes",
        "category" => "Fashion",
        "price" => 39.99,
        "colors" => ["white", "orange", "teal"],
        "image" => "https://i.pinimg.com/1200x/93/9c/65/939c650c130c16d44aba0bfda2ff7adc.jpg"
    ],
    [
        "name" => "Black Sport Shoes",
        "category" => "Sport",
        "price" => 69.99,
        "colors" => ["navy", "yellow", "red"],
        "image" => "https://i.pinimg.com/1200x/49/78/ff/4978ffb7b2458ab42c8f698cc0d86226.jpg"
    ]
];


function get_product_object($name, $category, $price, $colors, $image) {

    return [
       "title"       => $name,
        "type"        => $category . " Shoes",
        "price_tag"   => '$' . number_format($price, 2), 
        "all_colors"  => $colors,
        "img_url"     => $image,
        "bg_style"    => $colors[0] 
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body { background-color: #ebf1f5; color: #333; }
    
    .container { max-width: 1200px; margin: 0 auto; padding: 30px 20px; }
    .main-title { text-align: center; font-size: 2.2rem; margin-bottom: 30px; color: #0f172a; }
    .store-layout { display: grid; grid-template-columns: 2fr 1fr; gap: 25px; }
    @media (max-width: 900px) { .store-layout { grid-template-columns: 1fr; } }
    
 
    .products-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
    @media (max-width: 768px) { .products-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 576px) { .products-grid { grid-template-columns: 1fr; } }

    .product-card { background-color: #1e293b; border-radius: 12px; padding: 15px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
    .color-options { display: flex; align-items: center; gap: 6px; color: #94a3b8; font-size: 0.8rem; margin-bottom: 12px; }
    .dot { width: 12px; height: 12px; border-radius: 50%; display: inline-block; cursor: pointer; }
    .dot.pink { background-color: #ec4899; }
    .dot.green { background-color: #10b981; }
    .dot.purple { background-color: #8b5cf6; }
    .dot.blue { background-color: #3b82f6; }
    .dot.dark-blue { background-color: #1e3a8a; }
    .dot.red { background-color: #ef4444; }
    .dot.grey { background-color: #94a3b8; }
    .dot.white { background-color: #ffffff; border: 1px solid #ccc; }
    .dot.orange { background-color: #f97316; }
    .dot.teal { background-color: #14b8a6; }
    .dot.navy { background-color: #0f172a; }
    .dot.yellow { background-color: #eab308; }
    .image-wrapper { background-color: #fff; border-radius: 8px; height: 150px; display: flex; justify-content: center; align-items: center; overflow: hidden; margin-bottom: 15px; }
    .image-wrapper.pink-bg { background-color: #dc2626; }
    .image-wrapper img { width: 100%; height: 100%; object-fit: contain; }
    .product-info { text-align: center; }
    .product-info h3 { color: #ffffff; font-size: 1rem; margin-bottom: 4px; }
    .product-info .category { color: #94a3b8; font-size: 0.8rem; margin-bottom: 8px; }
    .product-info .price { color: #ef4444; font-size: 1.2rem; font-weight: bold; margin-bottom: 12px; }
    .btn-add { background-color: #0ea5e9; color: white; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-weight: 500; width: 80%; box-shadow: 0 0 10px rgba(14, 165, 233, 0.4); transition: background 0.2s; }
    .btn-add:hover { background-color: #0284c7; }
    .shopping-cart { background-color: #0f766e; border-radius: 12px; padding: 20px; color: white; align-self: start; }
    .shopping-cart h2 { font-size: 1.5rem; margin-bottom: 20px; }
    .cart-box { background-color: #115e59; border-radius: 8px; padding: 12px 15px; margin-bottom: 15px; }
    .box-label { display: block; font-size: 0.75rem; color: #ccfbf1; margin-bottom: 4px; }
    .box-value { font-size: 1.2rem; }
    .font-bold { font-weight: bold; }
    .price-text { font-weight: bold; color: #ffffff; }
    .cart-items { margin-top: 20px; margin-bottom: 20px; }
    .cart-item { background-color: #115e59; border-radius: 8px; padding: 10px 15px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
    .item-details { display: flex; flex-direction: column; }
    .item-name { font-size: 0.85rem; font-weight: 500; }
    .item-sub { font-size: 0.75rem; color: #99f6e4; }
    .quantity-controls { display: flex; align-items: center; gap: 8px; background: white; color: black; padding: 2px 6px; border-radius: 4px; }
    .qty-btn { background: none; border: none; font-weight: bold; cursor: pointer; padding: 0 4px; }
    .qty-val { font-size: 0.85rem; font-weight: bold; }
    .btn-pay, .btn-clear { width: 100%; padding: 12px; border-radius: 6px; font-weight: bold; cursor: pointer; margin-top: 10px; border: none; }
    .btn-pay { background-color: #111a2e; color: white; }
    .btn-clear { background: none; border: 1px solid #ccfbf1; color: white; }
    .btn-pay:hover { background-color: #090d18; }
    .btn-clear:hover { background-color: rgba(255, 255, 255, 0.1); }
</style>
<body>

   

    <main class="container">
        <h1 class="main-title">Welcome to shopping shoes</h1>

        <div class="store-layout">
            <section class="products-grid">
                
                <?php foreach ($products_data as $data): ?>
                    <?php 
                        
                        $product = get_product_object(
                            $data['name'], 
                            $data['category'], 
                            $data['price'], 
                            $data['colors'], 
                            $data['image']
                        ); 
                    ?>
                    
                    <div class="product-card">
                        <div class="color-options">
                            <span>Color:</span>
                            <?php foreach ($product['all_colors'] as $color): ?>
                                <span class="dot <?= $color ?>"></span>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="image-wrapper <?= $product['bg_style'] ?>">
                            <img src="<?= $product['img_url'] ?>" alt="<?= $product['title'] ?>">
                        </div>
                        
                        <div class="product-info">
                            <h3><?= $product['title'] ?></h3>
                            <p class="category"><?= $product['type'] ?></p>
                            <p class="price"><?= $product['price_tag'] ?></p>
                            <button class="btn-add">Add to Cart</button>
                        </div>
                    </div>
                <?php endforeach; ?>

            </section>
            
            <div class="shopping-cart">
                <h2>Shopping Cart</h2>
                <div class="cart-box">
                    <span class="box-label">Total Items</span>
                    <div class="box-value font-bold">6</div>
                </div>
                <div class="cart-box">
                    <span class="box-label">Total Price</span>
                    <div class="box-value price-text">$319.94</div>
                </div>
                <div class="cart-items">
                    <div class="cart-item">
                        <div class="item-details">
                            <span class="item-name">Pink Sports Shoes</span>
                            <span class="item-sub">$49.99 each</span>
                        </div>
                        <div class="quantity-controls">
                            <button class="qty-btn">-</button>
                            <span class="qty-val">4</span>
                            <button class="qty-btn">+</button>
                        </div>
                    </div>
                </div>
                <div class="cart-items">
                    <div class="cart-item">
                        <div class="item-details">
                            <span class="item-name">Black Sport Shoes</span>
                            <span class="item-sub">$49.99 each</span>
                        </div>
                        <div class="quantity-controls">
                            <button class="qty-btn">-</button>
                            <span class="qty-val">2</span>
                            <button class="qty-btn">+</button>
                        </div>
                    </div>
                </div>
                <button class="btn-pay">Pay Now</button>
                <button class="btn-clear">Clear Cart</button>
            </div>
        </div>
    </main>

</body>
</html>