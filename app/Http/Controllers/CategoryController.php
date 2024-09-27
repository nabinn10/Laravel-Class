<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('priority')->get();
        return view('category.index', compact('categories'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'priority' => 'required',
            'name' => 'required'
        ]);
        Category::create($data);
        return redirect(route('category.index'))->with('success', 'Category Created Successfully');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'priority' => 'required',
            'name' => 'required'
        ]);
        Category::find($id)->update($data);
        return redirect(route('category.index'))->with('success', 'Category Updated Successfully');
    }
    //destroy


    public function destroy(Request $request)
    {
        $id = $request->dataid;
        $category = Category::find($id);
        $product = Product::where('category_id', $id)->count();
        if ($product > 0) {
            return redirect()->route('category.index')->with('success', 'Category is used in product. It cannot be deleted directly');
        }
        $category->delete();
        return redirect(route('category.index'))->with('success', 'Category Deleted Successfully');
    }
}
