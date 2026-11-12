<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = [
            "id" => 1,
            "name" => "Iphone 18 Pro Max",
            "price" => 2400,
            "qty" => 10,
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGutsBRdw4vmMq3022PbViHtVo8ATLD7Shx4LkMC48PQ&s=10" ,
            'description' => "The iPhone 18 Pro Max is a smartphone designed"
        ];

        return view('/product/products', compact('product'));
    }
}

*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view("product.index");
    }

    public function create()
    {
        return view("product.create");
    }

    public function show()
    {
        return view("product.show");
    }

    public function edit()
    {
        return view("product.edit");
    }
}