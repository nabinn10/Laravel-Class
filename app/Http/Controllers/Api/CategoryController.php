<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // category order by priority
        $categories = Category::orderBy('priority')->get();
        return response()->json([
            'msg' => 'Category Fetched Successfully',
            'data' => $categories
        ]);
    }
}
