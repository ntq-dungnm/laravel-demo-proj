<?php

namespace App\Repository;

use App\Repository\BaseRepository;

use App\Models\AttributeValue;

class AttributesValueRepository
{
    public function create($attribute_id, $value)
    {
       return  AttributeValue::create([
            'attribute_id' => $attribute_id,
            'value' => $value,
        ]);
    }
}
