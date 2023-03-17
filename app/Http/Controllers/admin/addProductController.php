<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repository\CategoriesRepository;
use Illuminate\Http\Request;
use App\Repository\ProductRepository as ProductRepository;
use  App\Repository\AttributesRepository as AttributeRepository;
use  App\Repository\AttributesValueRepository;

use Illuminate\Database\Eloquent\Model;
use Cribbb\Entity\User\UserEntity;
use App\Models\Attribute as Attribute;
use App\Models\AttributeValue;

class addProductController extends Controller
{

    private $productRepo;
    private $attributeRepo;
    private $categoryRepo;
    private $attributeValuesRepo;
    public function __construct(ProductRepository $productRepository, AttributeRepository $attributeRepo, CategoriesRepository $categoryRepo, AttributesValueRepository $attributeValuesRepo)
    {
        $this->productRepo = $productRepository;
        $this->attributeRepo = $attributeRepo;
        $this->categoryRepo = $categoryRepo;
        $this->attributeValuesRepo = $attributeValuesRepo;
    }

    public function getAddProduct()
    {
        $categories =  $this->categoryRepo->getAll();
        return view('admin.addProduct', compact('categories'));
    }

    public function postAddProduct(Request $req)
    {
        // $pro = $req->all();
        $pro = [
            'title' => $req->title,
            'description' => $req->descriptions,
            'category_id' => $req->category_id,
            'status' => $req->status,
            'slug'  => $req->slug,
            'manufacturer_name' => $req->manufacturer_name,
            'manufacturer_brand' => $req->manufacturer_brand,
        ];


        $attribute = [
            'price' => $req->price,
            'stocks' => $req->stocks,
            'discount' => $req->discount,
            'orders' => $req->orders,
        ];


        $productId =  $this->productRepo->create($pro);

        $attribute_value = [];
        // $attribute_product_rs = [];

        foreach ($attribute as $key => $val) {
            $allAttributes =  Attribute::firstOrCreate(['name' => $key]);
            $attribute_id[] = $allAttributes['id'];
            $attribute_value[$allAttributes->id] = $val;
            // $attribute_product_rs[$productId->id] =  $allAttributes['id'];
        }
        // dd($attribute_product_rs);

        foreach ($attribute_value as $key => $value) {
            $this->attributeValuesRepo->create($key, $value);
        }



        // $productId = $product['id'];
        // $attribute_value = [];
        // foreach ($pro as $key => $value) {
        //     if ($key !== 'formAction' && $key !== 'category_id' && $key !== 'product_title' && $value !== null) {
        //         $attribute =  Attributes::firstOrCreate(['name' => $key]);
        //         $attribute_id[] =  $attribute['id'];
        //         $attribute_value[$attribute->id] = $value;
        //     }
        // }

        // foreach ($attribute_value as $key => $value) {
        //     $this->attributeValuesRepo->create(
        //         [
        //             'product_id' => $productId,
        //             'attribute_id' => $key,
        //             'attribute_value' => $value,
        //         ]
        //     );
        // }
    }
}
