<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('products')->where('id', $productId)->first();


        $data['id'] = $product_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->name;
        $data['price'] = $product_info->sale_price;
        $data['weight'] = $product_info->sale_price;
        $data['options']['feature_image_path'] = $product_info->feature_image_path;

        Cart::add($data);
        // Cart::destroy();
        return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
        return view('home.showcart');
    }

    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }
}
