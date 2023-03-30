<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'code_product',
        'thumnail',
        'status',
        'slug',
        'total_orders',
        'category_id',
        'manufacturer_name',
        'manufacturer_brand',
        'total_stocks',
        'description',
    ];

    public function variables()
    {
        return $this->HasMany(ProductVariable::class, 'product_id');
    }
}
