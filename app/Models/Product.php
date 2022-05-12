<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Categorieshomepage;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manufacturer',
        'status',
        'image_url',
        'origin',
        'insurance',
        'price',
        'promotional_price',
        'description'
    ];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function categories_homepage() {
        return $this->belongsToMany(Categorieshomepage::class);
    }

    public function carts() {
        return $this->belongsToMany(Cart::class)->withPivot('quantity', 'price');
    }
    // public function bills() {
    //     return $this->belongsToMany(Bill::class)->withPivot('quantity');
    // }
}
