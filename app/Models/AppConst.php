<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConst extends Model
{
    use HasFactory;

    const PRODUCTS_PER_PAGE = 10;
    const EXIST_PER_PAGE = 10;
}
