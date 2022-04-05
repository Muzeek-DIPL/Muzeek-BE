<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Comments::create($request->all());
       

        return redirect()->route('brands.index')->with('success', 'Brand created succesfully');
    }
}
