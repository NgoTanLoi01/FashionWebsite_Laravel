<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name', 'price', 'sale_price', 'content', 'user_id', 'category_id', 'quantity', 'slug', 'feature_image_name', 'feature_image_path', // Xóa 'features' từ đây
    ];
    protected $guarded = [];
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'product_tags',
            'product_id',
            'tag_id'
        )->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function productImage()
    {
        return $this->hasMany(ProductImage::class,  'product_id');
    }

    protected $table = 'products';
    // Trong tệp Product.php (hoặc tên tương ứng của model)

}
