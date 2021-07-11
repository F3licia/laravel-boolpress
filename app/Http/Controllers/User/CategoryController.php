<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
       // $categories = Category::all();
        //return view("admin.categories.index", compact("categories") );
    }
}
