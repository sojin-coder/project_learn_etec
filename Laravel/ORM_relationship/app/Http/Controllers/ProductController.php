<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view("crud-image.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud-image.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|min:3',
                'price' => 'required|numeric|min:1',
                'qty' => 'required|numeric|min:1',
                'image' => 'required|file',
                'description' => 'nullable'
            ]);

            $name = $request->input('name');
            $price = $request->input('price');
            $qty = $request->input('qty');
            $description = $request->input('description');

            $imagePath = $request->file('image')->store('Uploads', 'public');

            $product = Product::create([
                'name' => $name,
                'price' => $price,
                'qty' => $qty,
                'image' => $imagePath,
                'description' => $description,
            ]);

            return redirect()->route('products.index')
                ->with('success', 'Product Created Successfully.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Product Created Failed: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("crud-image.show", compact("product"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
