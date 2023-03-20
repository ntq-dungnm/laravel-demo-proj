<?php

namespace App\Services;

use App\Models\Product;
use App\Repository\AttributesRepository;
use App\Repository\CategoriesRepository;
use App\Repository\ProductRepository;
use App\Repository\AttributesValueRepository;
use GuzzleHttp\Psr7\Request;
use App\Models\Attribute;

class ProductService
{
    protected $productRepo;
    protected $attributeRepo;
    protected $categoryRepo;
    protected $attributeValuesRepo;
    public function __construct(ProductRepository $productRepository, AttributesRepository $attributeRepo, CategoriesRepository $categoryRepo, AttributesValueRepository $attributeValuesRepo)
    {
        $this->productRepo = $productRepository;
        $this->attributeRepo = $attributeRepo;
        $this->categoryRepo = $categoryRepo;
        $this->attributeValuesRepo = $attributeValuesRepo;
    }

    public function addProduct(array $Product)
    {
        $pro = [
            'title' => $Product['title'],
            'description' => $Product['descriptions'],
            'category_id' => $Product['category_id'],
            'status' => $Product['status'],
            'slug'  => $Product['slug'],
            'manufacturer_name' => $Product['manufacturer_name'],
            'manufacturer_brand' => $Product['manufacturer_brand'],
        ];


        $attribute = [
            'price' => $Product['price'],
            'stocks' => $Product['stocks'],
            'discount' => $Product['discount'],
            'orders' => $Product['orders'],
        ];


        $productId =  $this->productRepo->create($pro);

        $attribute_value = [];

        foreach ($attribute as $key => $val) {
            $allAttributes =  Attribute::firstOrCreate(['name' => $key]);
            $attribute_id[] = $allAttributes['id'];
            $attribute_value[$allAttributes->id] = $val;
        }

        foreach ($attribute_value as $key => $value) 
        {
            $this->attributeValuesRepo->create($key, $value);
        };

        

        return null;
    }   
}
