<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =  [
        'user_id',
        'order_total',
        'order_status'
    ];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function shipping()
    {
        return $this->hasOne(Shipping::class,'order_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
