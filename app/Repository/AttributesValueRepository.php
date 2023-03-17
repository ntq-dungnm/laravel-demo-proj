<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use PDO;
use DB;
use Illuminate\Support\Carbon;
use  App\Models\AttributeProductVariable;
use App\Model\Product;
use Illuminate\Database\Eloquent\Model;
use App\Models\AttributeValue;

class AttributesValueRepository
{
    public function create($attribute_id, $value)
    {
        AttributeValue::create([
            'attribute_id' => $attribute_id,
            'value' => $value,
        ]);
    }
}
