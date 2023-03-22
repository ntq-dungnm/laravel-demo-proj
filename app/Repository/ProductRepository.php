<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use DB;
use App\Models\Product as Product;

class ProductRepository implements BaseRepository
{


    public function getById($id)
    {
        return DB::table('product')
            ->where('id', $id)
            ->get();
    }

    public static function getAll()
    {
        return Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->join('product_variables', 'product_variables.product_id', '=', 'products.id')
            ->select('products.*', 'categories.title as category_title', DB::raw('CONCAT( MIN(product_variables.regular_price)," -    ","   ","$", MAX(product_variables.regular_price)) as price_range'))
            ->groupBy('products.id')
            ->get();
    }

    public static function create(array $product)
    {
        $newProduct =  Product::create([
            'title' => $product['title'],
            'category_id' => $product['category_id'],
            'slug' => 'product-' . str_replace(' ', '-', strtolower($product['title'])),
            'description' => $product['descriptions'],
            'total_stocks' => $product['stocks'],
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
