<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class CategoryAdminController extends Controller
{
    public function index($slug, $categoryId)
    {
        $categorysLimit = Category::where('parent_id', 0)->take(6)->get();
        $products = Product::where('category_id', $categoryId)->paginate(16);
        $categorys = Category::where('parent_id', 0)->get();
        return view('product.category.list', compact('categorysLimit', 'products','categorys'));
    }
}
