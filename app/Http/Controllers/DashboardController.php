<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $categories = Category::count();
        $blogs = blog::count();
        $products = Product::count();

        return view('dashboard',compact('categories','blogs','products'));
    }
}
