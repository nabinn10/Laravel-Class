<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $products = Product::latest()->limit(4)->get();
        return view('welcome', compact('products'));
    }

    public function viewproduct($id)
    {
        $products = Product::find($id);
        $relatedproducts = Product::where('category_id',$products->category->id)->where('id','!=',$id)->limit(4)->get();
        return view('viewproduct', compact('products','relatedproducts'));

    }

    public function categoryproduct($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();
        return view('categoryproduct', compact('products', 'category'));
    }
}
