<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use App\Models\AttributeProductVariable;

class AttributeProductVariableRepository implements BaseRepository
{
    public function getBySlug($slug){
        
    }
    public function getById($id)
    {
    }

    public static function getAll()
    {
    }

    public static function create($productVariable)
    {
        $attributeValueIds = $productVariable['attribute_value_id'];
        $productVariableId = $productVariable['product_variable_id'];

        foreach ($attributeValueIds as $attributeValueId) {
            AttributeProductVariable::create([
                'attribute_value_id' => $attributeValueId,
                'product_variable_id' => $productVariableId
            ]);
        }
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
}
