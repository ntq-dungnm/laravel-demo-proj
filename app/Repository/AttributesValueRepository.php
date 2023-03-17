<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use PDO;
use DB;
use Illuminate\Support\Carbon;
use  App\Models\Attribute;
use App\Model\Product;
use Illuminate\Database\Eloquent\Model;
use App\Models\AttributesValue;

class AttributesRepository implements BaseRepository
{
    // protected $categoriesRepository;

    // public function __construct(UserRepository $categoriesRepository)
    // {
    //     $this->categoriesRepository = $categoriesRepository;
    // }

    public function getById($id)
    {
        return Attribute::where('id', $id)
            ->get();
    }

    public static function getAll()
    {
        return Attribute::all();
        // dd(Attribute::all());
    }

    public static function create($product)
    {
        Attribute::create([
            'product_id' => $product['id'],
        ]);
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
