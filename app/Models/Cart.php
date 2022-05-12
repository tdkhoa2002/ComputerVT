<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
    ];

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }

    public function orders() {
        return $this->belongsToMany(Cart::class);
    }
}
