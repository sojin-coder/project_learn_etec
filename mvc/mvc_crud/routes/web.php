<?php

require_once '../config/database.php';
require_once '../app/controllers/ProductController.php';

$controller = new ProductController($conn);

$action = $_GET['action'] ?? 'index';

if ($action === 'index') {

    $controller->index();

} elseif ($action === 'create') {

    $controller->create();

} elseif ($action === 'store') {

    $controller->store();

} elseif ($action === 'delete') {

    $controller->delete();
}