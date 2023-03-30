<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariable extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'regular_price',
        'image',
    ];

    public function attributes()
    {
        return $this->hasMany(AttributeProductVariable::class, 'product_variable_id');
    }
}
