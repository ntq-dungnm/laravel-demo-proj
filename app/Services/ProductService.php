<?php

namespace App\Services;

use App\Models\Product;
use App\Repository\AttributesRepository;
use App\Repository\CategoriesRepository;
use App\Repository\ProductRepository;
use App\Repository\AttributesValueRepository;
use App\Repository\ProductVariableRepository;
use App\Repository\AttributeProductVariableRepository;
use GuzzleHttp\Psr7\Request;
use App\Models\Attribute;

class ProductService
{
    protected $productRepo;
    protected $attributeRepo;
    protected $categoryRepo;
    protected $attributeValuesRepo;
    protected $productVariableRepository;
    protected $attributeProductVariableRepository;

    public function __construct(
        ProductRepository $productRepository,
        AttributesRepository $attributeRepo,
        CategoriesRepository $categoryRepo,
        AttributesValueRepository $attributeValuesRepo,
        ProductVariableRepository $productVariableRepository,
        AttributeProductVariableRepository $attributeProductVariableRepository
    ) {
        $this->productRepo = $productRepository;
        $this->attributeRepo = $attributeRepo;
        $this->categoryRepo = $categoryRepo;
        $this->attributeValuesRepo = $attributeValuesRepo;
        $this->productVariableRepository = $productVariableRepository;
        $this->attributeProductVariableRepository = $attributeProductVariableRepository;
    }

    public function addProduct(array $product, array $variation)
    {
        $pro = [
            'title' => $product['title'],
            'description' => $product['descriptions'],
            'category_id' => $product['category_id'],
            'status' => $product['status'],
            'slug'  => $product['slug'],
            'manufacturer_name' => $product['manufacturer_name'],
            'manufacturer_brand' => $product['manufacturer_brand'],
        ];


        $attribute = [
            'price' => $product['price'],
            'stocks' => $product['stocks'],
            'discount' => $product['discount'],
            'orders' => $product['orders'],
        ];

        //create product
        $thisProduct =  $this->productRepo->create($pro);

        $attribute_value = [];

        //create all attributes for product
        foreach ($attribute as $key => $val) {
            $allAttributes =  Attribute::firstOrCreate(['name' => $key]);

            $attribute_id[] = $allAttributes['id'];

            $attribute_value[$allAttributes->id] = $val;
        }

        foreach ($attribute_value as $key => $value) {
            $this->attributeValuesRepo->create($key, $value);
        };


        $productVariations = [];

        foreach ($variation as $key => $value) {
            $productVariations['product_id'] = $thisProduct['id'];

            $productVariations['price'] = $value['variable_price'];

            $newProductVariableRepository  =  $this->productVariableRepository->create($productVariations);

            $productVariableId =  $newProductVariableRepository['id'];

            foreach ($value as $attribute => $val) {

                $variationAttributes =  Attribute::firstOrCreate(['name' => $attribute]);

                $newAttributeValue = $this->attributeValuesRepo->create($variationAttributes->id, $val);

                $attributeValueIds[] = $newAttributeValue['id'];
            }

            $productVaribales = [
                'product_variable_id' => $productVariableId,
                'attribute_value_id' => $attributeValueIds,
            ];

            $this->attributeProductVariableRepository->create($productVaribales);

            $productVaribales = null;

            $attributeValueIds = null;
        };


        return null;
    }
}
