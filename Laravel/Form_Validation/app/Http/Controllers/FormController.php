<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    public function create(){
       return view('form_validation.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:50',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'des' => 'nullable'
        ]);

        $title = $request->input('title');
        $price = $request->input('price');
        $stock = $request->input('stock');
        $des = $request->input('des');

        $data = [
            'title' => $title,
            'price' => $price,
            'stock' => $stock,
            'des' => $des
        ];

        return view('form_validation.product', compact('data'));
    }
}
