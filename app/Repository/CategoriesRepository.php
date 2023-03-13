<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use PDO;
use DB;
use Illuminate\Support\Carbon;
use App\Models\Category;

class CategoriesRepository implements BaseRepository
{
    

    public function getById($id)
    {
        return DB::table('categories')
            ->where('id', $id)
            ->get();
    }

    public static function getAll()
    {
        return Category::all();
    }

    public static function create($product)
    {
        // DB::table('product')->insert(
        //     [
        //         'name' => $product['name'],
        //         'img' => $product['img'],
        //         'category_id' => $product['category_id'],
        //         'created_at' => Carbon::now(),
        //         'manufacturer_name' => $product['manufacturer_name'],
        //         'manufacturer_brand' => $product['manufacturer_brand'],
        //     ]
        // );
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
        return null;
    }
}
