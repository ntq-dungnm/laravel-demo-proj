<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use App\Models\ProductVariable;
use App\Models\Product;

class ProductVariableRepository implements BaseRepository
{


    public function getById($productId)
    {
        return Product::with('variables.attributes.values.attribute')
        ->where('id', $productId)
        ->get();
    }

    public static function getAll()
    {
    }

    public static function create($product)
    {
        // dd($product);
        return  ProductVariable::create([
            'product_id' => $product['product_id'],
            'image' => $product['img'],
            'regular_price' => $product['price'],
        ]);
    }

    public function delete($id)
    {
        
    }

    public function edit($id)
    {
    }

    public static function getByName($name)
    {
    }
    public function getBySlug($slug)
    {
    }
}
