<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all(); // Eloquent ORM
        //    $products = Product::where('price','>',400)->get();
        // $products = Product::whereLike('title','%Pro%')->get(); 
        return view('pages.product_list', compact('products'));
    }
        
    public function find(){
            $product = Product::find(5);
            return view('pages.find', compact('product'));
    }

    public function create(){
        // Product::create([
        //     'title' =>"Hearphone",
        //     'price' =>200.50,
        //     'qty'=>100,
        //     'description' => 'Apple ....',
        // ]);

        $products = Product::make([
            'title' => "phone",
            'price' => 400.50,
            'qty' => 50,
            'description' => 'phone ....',
        ]);
        $products->save();
        return redirect()->route('all');
    }


    public function update(){
        // $product = Product::findf
        $product = Product::findOrFail(5);

        $product->update([
            'title' => "Update Product",
            'price' => 3000,
            'qty' => 30,
            'description' => 'Update product........'
        ]);

        return redirect()->route('all');
    }
    public function delete(){
         $product = Product::findOrFail(2);
        $product->delete();
        
        return redirect()->route('all');
    }
}

