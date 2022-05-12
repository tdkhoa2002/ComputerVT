<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'parent_id',
        'icon'
    ];

    public function products() {
        return $this->belongsToMany(Product::class);
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
