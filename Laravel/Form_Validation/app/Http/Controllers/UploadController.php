<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function create()
    {
        return view('form-uploads.form-uploads');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:5|max:50',
            'content' => 'required|string|min:5|max:100',
            'image' => 'required|file|mimes:jpg,png,webp|max:2048'
        ]);
        $imagePath = $request->file('image')->store('uploads', 'public');

        return redirect()->route('post.create')
            ->with('success', 'Uploads image Successfully.')
            ->with('data', [
                'title' => $validated['title'],
                'content' => $validated['content'],
                'image' => $imagePath
            ]);
    }
}