<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use PDO;
use DB;
use Illuminate\Support\Carbon;
use App\Models\Product as Product;
use App\Models\AttributeValue;

class ProductRepository implements BaseRepository
{
    // protected $productRepository;
    // public function __construct(UserRepository $productRepository )
    // {
    //     $this->productRepository = $productRepository;
    // }

    public function getById($id)
    {
        return DB::table('product')
            ->where('id', $id)
            ->get();
    }

    public static function getAll()
    {
        return DB::table('product')
            ->get();
    }

    public static function create($product)
    {
        $newProduct =  Product::create([
            'title' => $product['title'],
            'category_id' => $product['category_id'],
            'slug' => $product['slug'],
            // 'description' => $product['description'],
            // 'total_stocks' => $product['stocks'],
            'status' => $product['status'],
        ]);
        return $newProduct;
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
