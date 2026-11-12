<?php

class CustomerController extends Controller
{
    private Product $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index(): void
    {
        $products = $this->productModel->all();

        $this->view('customer/index', [
            'products' => $products
        ]);
    }

    public function show(): void
{
    $id = $_GET['id'] ?? null;

    if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
        die('Invalid Product ID');
    }

    $product = $this->productModel->find((int) $id);

    if (!$product) {
        die('Product not found');
    }

    $this->view('customer/show', [
        'product' => $product
    ]);
}


public function checkout(): void
{
    $id = $_GET['id'] ?? null;

    if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
        die('Invalid Product ID');
    }

    $product = $this->productModel->find((int) $id);

    if (!$product) {
        die('Product not found');
    }

    if ((int) $product['stock'] <= 0) {
        die('Product is out of stock');
    }

    $this->view('customer/checkout', [
        'product' => $product
    ]);
}
}