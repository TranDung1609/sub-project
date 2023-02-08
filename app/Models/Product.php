<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $timestamp = false;
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'description',
        'discount'
    ];

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }
    // public function scopeSearch($productuery){
    //     if($keyword = request()->keyword){
    //         $productuery = $productuery->where('name', 'like', '%'.$keyword.'%');
    //     }
    //     return $productuery;
    // }
    public function scopeFilter($product)
    {
        if(request('name')){
            $product->where('name','like','%'.request('name').'%');
        }
        if (request('price_from')) {
            $product->where('price', '>=', request('price_from'))
                    ->where('price', '<=', request('price_to'))->orderBy('price', 'asc');
        }
        if (request('time') == 'newest') {
            $product->orderBy('created_at', 'desc');
        }
        if (request('time') == 'oldest') {
            $product->orderBy('created_at', 'asc');
        }
        if (request('sort') == 'za') {
            $product->orderBy('name', 'desc');
        }
        if (request('sort') == 'az') {
            $product->orderBy('name', 'asc');
        }
        if (request('price') == 'giam') {
            $product->orderBy('name', 'desc');
        }
        if (request('price') == 'tang') {
            $product->orderBy('name', 'asc');
        }
        return $product;
    }
}
