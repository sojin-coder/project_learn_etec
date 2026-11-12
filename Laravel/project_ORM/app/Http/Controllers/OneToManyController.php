<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function index()
    {
        $users = User::with('posts')->get();

        return view('one-many.index', compact('users'));
    }
}
