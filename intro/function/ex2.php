<?php
// ចាប់ផ្តើម Session ដើម្បីរក្សាទុកទិន្នន័យកន្ត្រកទំនិញ (Cart)
session_start();

// ១. បង្កើត Function សម្រាប់ផ្ទុកទិន្នន័យផលិតផលទាំងអស់ (Array)
function getProducts() {
    return [
        1 => [
            "name" => "LEBRON MAX AIR",
            "category" => "KIDS' BACKPACK",
            "price" => 65.00,
            "image" => "https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300" // រូបភាពតំណាង
        ],
        2 => [
            "name" => "RED TRAVEL BAG",
            "category" => "SCHOOL BACKPACK",
            "price" => 55.00,
            "image" => "https://images.unsplash.com/photo-1547949003-9792a18a2601?w=300"
        ],
        3 => [
            "name" => "SPORT RUNNING SHOES",
            "category" => "MEN SHOES",
            "price" => 72.00,
            "image" => "https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=300"
        ],
        4 => [
            "name" => "CLASSIC HAND BAG",
            "category" => "FASHION BAG",
            "price" => 48.00,
            "image" => "https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=300"
        ]
    ];
}

// ២. បង្កើត Function សម្រាប់បន្ថែមទំនិញទៅក្នុងកន្ត្រក
function addToCart($productId) {
    $products = getProducts();
    if (isset($products[$productId])) {
        // បើមានទំនិញនេះក្នុងកន្ត្រករួចហើយ ថែមចំនួន +1
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['qty'] += 1;
        } else {
            // បើមិនទាន់មានទេ ដាក់ចូលទៅថ្មី
            $_SESSION['cart'][$productId] = [
                "name" => $products[$productId]['name'],
                "price" => $products[$productId]['price'],
                "qty" => 1
            ];
        }
    }
}

// ៣. បង្កើត Function សម្រាប់លុបកន្ត្រកទំនិញចោលទាំងស្រុង
function clearCart() {
    $_SESSION['cart'] = [];
}

// ៤. បង្កើត Function គណនាចំនួនទំនិញសរុបក្នុងកន្ត្រក
function getTotalItems() {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['qty'];
        }
    }
    return $total;
}

// ៥. បង្កើត Function គណនាតម្លៃសរុបក្នុងកន្ត្រក
function getTotalPrice() {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
    }
    return $total;
}

// ពិនិត្យមើល Action ដែលផ្ញើមកពីប៊ូតុង
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'add' && isset($_POST['product_id'])) {
        addToCart($_POST['product_id']);
    }
    if ($_POST['action'] == 'clear') {
        clearCart();
    }
    // បញ្ជូនទៅទំព័រដដែលវិញដើម្បីកុំឱ្យទិន្នន័យផ្ញើទុករាល់ពេល Refresh
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$products = getProducts();
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KH STORE - Shopping Cart</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', system-ui, sans-serif; }
        body { background-color: #f8fafc; margin: 0; padding: 20px; color: #334155; }
        
        .exercise-title { text-align: center; font-size: 22px; font-weight: bold; margin-bottom: 20px; text-decoration: underline; }
        .container { max-width: 1200px; margin: 0 auto; display: flex; gap: 25px; flex-wrap: wrap; }
        
        /* Navbar Styling */
        header { background: white; padding: 15px 30px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 25px; width: 100%; max-width: 1200px; margin-left: auto; margin-right: auto; }
        .logo { font-size: 22px; font-weight: bold; color: #ef4444; display: flex; align-items: center; gap: 5px; }
        nav a { margin: 0 15px; text-decoration: none; color: #64748b; font-weight: 500; }
        nav a.active { color: #ef4444; border-bottom: 2px solid #ef4444; padding-bottom: 5px; }
        .cart-icon { position: relative; font-size: 22px; cursor: pointer; }
        .cart-badge { position: absolute; top: -8px; right: -12px; background: #ef4444; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px; }

        /* Products Grid */
        .products-section { flex: 2; min-width: 600px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
        .product-card { background: white; border-radius: 12px; padding: 15px; display: flex; gap: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); border: 1px solid #f1f5f9; }
        .product-img { width: 130px; height: 130px; object-fit: cover; border-radius: 8px; background: #f1f5f9; }
        .product-info { display: flex; flex-direction: column; justify-content: space-between; flex: 1; }
        .prod-title { font-size: 16px; font-weight: bold; color: #1e293b; margin: 0; }
        .prod-cat { font-size: 12px; color: #94a3b8; font-weight: 600; margin-top: 2px; }
        .prod-price { font-size: 18px; font-weight: bold; color: #0f172a; margin: 8px 0; }
        .prod-desc { font-size: 11px; color: #64748b; margin-bottom: 10px; line-height: 1.4; }
        .btn-add { background: white; border: 1px solid #cbd5e1; color: #334155; padding: 8px; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 13px; width: 100%; display: flex; justify-content: center; align-items: center; gap: 5px; }
        .btn-add:hover { background: #f8fafc; border-color: #94a3b8; }

        /* Sidebar Sidebar Logic Card */
        .sidebar { flex: 1; min-width: 350px; background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); height: fit-content; }
        .side-title { color: #ef4444; font-size: 18px; font-weight: bold; margin-top: 0; margin-bottom: 20px; display: flex; align-items: center; gap: 8px; }
        
        .stat-box { display: flex; align-items: center; justify-content: space-between; background: #f8fafc; padding: 12px 15px; border-radius: 10px; margin-bottom: 12px; }
        .stat-left { display: flex; align-items: center; gap: 10px; font-size: 13px; color: #64748b; font-weight: 600; }
        .stat-icon { font-size: 18px; background: #fff1f2; padding: 6px; border-radius: 8px; color: #ef4444; }
        .stat-val { font-weight: bold; font-size: 16px; color: #1e293b; }
        .stat-val.price { color: #ef4444; font-size: 20px; }

        /* Cart Item list inside sidebar */
        .cart-list-item { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-top: 1px solid #f1f5f9; margin-top: 10px; font-size: 14px; }
        .cart-item-name { font-weight: bold; color: #334155; }
        .cart-item-price { font-size: 12px; color: #64748b; }
        .qty-control { display: flex; align-items: center; gap: 8px; background: #f1f5f9; padding: 4px 8px; border-radius: 6px; font-weight: bold; }

        .banner-text { background: #fff5f5; color: #ef4444; font-size: 12px; padding: 12px; border-radius: 8px; text-align: center; margin: 20px 0; font-weight: 500; }
        .banner-text strong { color: #b91c1c; }

        .btn-pay { background: #ef4444; color: white; width: 100%; padding: 12px; border: none; border-radius: 8px; font-weight: bold; font-size: 15px; cursor: pointer; margin-bottom: 10px; }
        .btn-pay:hover { background: #dc2626; }
        .btn-clear { background: none; border: none; color: #94a3b8; width: 100%; text-align: center; cursor: pointer; font-size: 13px; font-weight: 500; text-decoration: underline; }
        .btn-clear:hover { color: #64748b; }
    </style>
</head>
<body>

    <div class="exercise-title">លំហាត់សម្រាប់អនុវត្ត៣ (ប្រើប្រាស់ Function ក្នុងការដោះស្រាយ)</div>

    <header>
        <div class="logo">🛍️ KH STORE</div>
        <nav>
            <a href="#" class="active">All Products</a>
            <a href="#">Backpacks</a>
            <a href="#">Shoes</a>
            <a href="#">Accessories</a>
            <a href="#">Contact</a>
        </nav>
        <div class="cart-icon">
            🛒 <span class="cart-badge"><?= getTotalItems(); ?></span>
        </div>
    </header>

    <div class="container">
        <div class="products-section">
            <?php foreach ($products as $id => $prod): ?>
                <div class="product-card">
                    <img src="<?= $prod['image'] ?>" alt="Product" class="product-img">
                    <div class="product-info">
                        <div>
                            <h3 class="prod-title"><?= $prod['name'] ?></h3>
                            <div class="prod-cat"><?= $prod['category'] ?></div>
                            <div class="prod-price">$<?= number_format($prod['price'], 2) ?></div>
                            <div class="prod-desc">This product is designed for daily use with a clean design, comfortable style, and modern look.</div>
                        </div>
                        <form method="POST">
                            <input type="hidden" name="product_id" value="<?= $id ?>">
                            <input type="hidden" name="action" value="add">
                            <button type="submit" class="btn-add">🛒 ADD TO CART</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="sidebar">
            <h3 class="side-title">📊 PHP Logic Card</h3>
            
            <div class="stat-box">
                <div class="stat-left"><span class="stat-icon">🏷️</span> Total Products</div>
                <div class="stat-val"><?= count($products) ?></div>
            </div>

            <div class="stat-box">
                <div class="stat-left"><span class="stat-icon">🛒</span> Total Items Cart</div>
                <div class="stat-val"><?= getTotalItems(); ?></div>
            </div>

            <div class="stat-box">
                <div class="stat-left"><span class="stat-icon">💰</span> Total Price</div>
                <div class="stat-val price">$<?= number_format(getTotalPrice(), 2); ?></div>
            </div>

            <?php if (!empty($cart_items)): ?>
                <?php foreach ($cart_items as $item): ?>
                    <div class="cart-list-item">
                        <div>
                            <div class="cart-item-name"><?= $item['name'] ?></div>
                            <div class="cart-item-price">$<?= number_format($item['price'], 2) ?> each</div>
                        </div>
                        <div class="qty-control">
                            <span>-</span> <span><?= $item['qty'] ?></span> <span>+</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; color: #94a3b8; font-size: 13px; margin: 20px 0;">Your cart is empty.</p>
            <?php endif; ?>

            <div class="banner-text">
                Practice every day. Small steps can make you a <strong>better programmer!</strong>
            </div>

            <button class="btn-pay">💳 PAY NOW</button>

            <form method="POST">
                <input type="hidden" name="action" value="clear">
                <button type="submit" class="btn-clear">Clear Cart</button>
            </form>
        </div>
    </div>

</body>
</html>