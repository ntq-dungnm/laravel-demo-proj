<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'code_product',
        'status',
        'slug',
        'total_orders',
        'category_id',
        'manufacturer_name',
        'manufacturer_brand',
        'total_stocks',
        'description',
    ];
}
