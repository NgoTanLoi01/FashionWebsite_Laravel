<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slider;

class HomeAdminController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(10)->get();
        $productsSelling = Product::latest('views_count', 'desc')->take(12)->get();
        //$productsFeatures = Product::latest('features', 'desc')->take(12)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(6)->get();

        // Truyền biến $categorys vào view
        return view("home.home", compact("sliders", "categorys", "products", "productsSelling", "categorysLimit"));
    }

    public function detail($slug)
    {
        $product = Product::where("slug", $slug)->first();
        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return view('home.detail', compact('product', 'related'));
    }
}
