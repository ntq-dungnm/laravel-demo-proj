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
use SplFileInfo;
use Cloudinary;
use Illuminate\Http\UploadedFile;

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
        // dd($variation);

        // $proIMG = [];
        // foreach ($variation as $key => $value) {
        //     foreach ($value as $img => $k) {
        //         if (strcmp($img, 'variable_img') == 0) {
        //             array_push($proIMG, $k);
        //         }
        //     }
        // };

        // dd($proIMG);
        // dd($product);
        $pro = [
            'title' => $product['title'],
            'description' => $product['descriptions'],
            'category_id' => $product['category_id'],
            'status' => $product['status'],
            'img'   => $product['img'],
            'stock' => $product['stocks'],
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



        //create attribute value
        foreach ($attribute_value as $key => $value) {
            $this->attributeValuesRepo->create($key, $value);
        };


        $productVariations = [];


        // foreach($variation['img'] as $img){

        // }

        //insert into 
        $hehe = [];
        // dd($variation['variations_0']['variable_price']); 
        // foreach ($variation as $key => $value) {
        //     $productVariations['product_id'] = $thisProduct['id'];

        //         $productVariations['price'] = $value['variable_price'];

        //         $productVariations['img'] = Cloudinary::upload($value['variable_img']->getRealPath())->getSecurePath();

        //         $newProductVariableRepository  =  $this->productVariableRepository->create($productVariations);

        //     foreach ($value as $attribute => $val) {

        //         $variationAttributes =  Attribute::firstOrCreate(['name' => $attribute]);

        //         $newAttributeValue = $this->attributeValuesRepo->create($variationAttributes->id, $val);

        //         $attributeValueIds[] = $newAttributeValue['id'];
        //     }



        //     $productVariableId =  $newProductVariableRepository['id'];

        //     $productVaribales = [
        //         'product_variable_id' => $productVariableId,
        //         'attribute_value_id' => $attributeValueIds,
        //     ];

        //     $this->attributeProductVariableRepository->create($productVaribales);

        //     $productVaribales = null;

        //     $attributeValueIds = null;
        // };

        foreach ($variation as $key => $value) {
            $productVariations['product_id'] = $thisProduct['id'];
            $productVariations['price'] = $value['variable_price'];
            $productVariations['img'] = Cloudinary::upload($value['variable_img']->getRealPath())->getSecurePath();
        //    dd($productVariations['img']);
            $newProductVariableRepository = $this->productVariableRepository->create($productVariations);
        }


        foreach ($variation as $key => $value) {
            $attributeValueIds = [];
            foreach ($value as $attribute => $val) {
                if ($attribute != 'variable_price' && $attribute != 'variable_img') {
                    $variationAttributes = Attribute::firstOrCreate(['name' => $attribute]);
                    $newAttributeValue = $this->attributeValuesRepo->create($variationAttributes->id, $val);
                    $attributeValueIds[] = $newAttributeValue['id'];
                }
            }
 
            $productVariableId = $newProductVariableRepository['id'];

            $productVariables = [
                'product_variable_id' => $productVariableId,
                'attribute_value_id' => $attributeValueIds,
            ];

            $this->attributeProductVariableRepository->create($productVariables);
        }


        return null;
    }
}
