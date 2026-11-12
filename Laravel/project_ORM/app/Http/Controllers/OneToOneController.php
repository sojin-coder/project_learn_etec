<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    public function index(){
        $users = User::with('profile')->get();

        return view('one-one.index',compact('users'));
    }
}

