<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use PDO;
use DB;
use Illuminate\Support\Carbon;
use  App\Models\Attribute;
use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class AttributesRepository implements BaseRepository
{
    public function getBySlug($slug){
        
    }
    
    public function getById($id)
    {
        return Attribute::where('id', $id)
            ->get();
    }

    public static function getAll()
    {
        return Attribute::all();
    }

    public static function create($product)
    {
    }

    public function delete($id)
    {
        DB::table('users')->delete()
            ->where('id', $id);
    }

    public function edit($id)
    {
        return null;
    }

    public static function getByName($name)
    {
    }
}
