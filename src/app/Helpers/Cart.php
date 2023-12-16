<?php

namespace App\Helpers;

class Cart
{
    private $items = [];
    private $total_quantity = 0;
    private $total_price = 0;

    public function __construct()
    {
        $this->items = session("cart") ? session("cart") : [];
    }

    //Phương thức lấy về danh sách sản phẩm trong giỏ hàng
    public function list()
    {
        return $this->items;
    }

    //Thêm mới sản phẩm vào giỏ hàng
    public function add($product, $quantity = 1)
    {
        $item = [
            'productId' => $product->id,
            'name' => $product->name,
            'price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
            'image' => $product->feature_image_path,
            'quantity' => $quantity
        ];
        $this->items[$product->id] = $item;

        session(['cart' => $this->items]);
    }

    //Cập nhật giỏ hàng


    //Xóa sản phẩm khỏi giỏ hàng


    //Xóa hết sản phẩm khỏi giỏ hàng


    //Phương thức lấy về tổng tiền
    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $totalPrice;
    }

    public function getTotalQuantity()
    {
        $total= 0;
        foreach ($this->items as $item) {
            $total += $item['quantity'];
        }

        return $total;
    }
}
