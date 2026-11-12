<?php

// $router->get("/", [WelcomeController::class, 'index']);
// $router->get("/about", [WelcomeController::class, 'about']);
$router->get("/", [ProductController::class, 'index']);
$router->get('/products/create', [ProductController::class, 'create']);
$router->post('/products/store', [ProductController::class, 'store']);
$router->get('/products/show', [ProductController::class, 'show']);
$router->get('/products/edit', [ProductController::class, 'edit']);
$router->post('/products/update', [ProductController::class, 'update']);
$router->post('/products/destroy', [ProductController::class, 'destroy']);