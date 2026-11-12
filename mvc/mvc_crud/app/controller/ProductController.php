<?php
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    public function index() {
        // បង្កើត Object Database & Product Model
        $database = new Database();
        $db = $database->getConnection();
        $productModel = new Product($db);

        // ទាញយកទិន្នន័យ
        $products = $productModel->getAllProducts();

        // ផ្ញើទិន្នន័យទៅបង្ហាញនៅ View
        require_once __DIR__ . '/../views/products/index.php';
    }
}