<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use App\Models\ProductVariable;

class ProductVariableRepository implements BaseRepository
{


    public function getById($productId)
    {
        return ProductVariable::where('product_id', $productId)
            ->join('Attribute_product_variables', 'product_variables.id', '=', 'attribute_product_variables.product_variable_id')
            ->join('Attribute_values', 'attribute_product_variables.attribute_value_id', '=', 'attribute_values.id')
            ->join('Attributes', 'Attribute_values.attribute_id', '=', 'Attributes.id')
            // ->groupBy('Attribute_product_variables.product_variable_id')
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
