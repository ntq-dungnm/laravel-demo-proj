<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repository\CategoriesRepository as CategoriesRepository;
use Illuminate\Http\Request;
use App\Repository\ProductRepository as ProductRepository;
use  App\Repository\AttributesRepository as AttributeRepository;
use Illuminate\Database\Eloquent\Model;
use Cribbb\Entity\User\UserEntity;
use App\Models\Attribute as Attributes;
use App\Models\AttributesValue;

class addProductController extends Controller
{

    private $productRepo;
    private $attributeRepo;
    private $categoryRepo;
    private $attributeValuesRepo;
    public function __construct(ProductRepository $productRepository, AttributeRepository $attributeRepo, CategoriesRepository $categoryRepo, AttributesValue $attributeValuesRepo)
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
        $pro = $req->all();
        $product = $this->productRepo->create($pro);
        $productId = $product['id'];
        $attribute_value = [];
        foreach ($pro as $key => $value) {
            if ($key !== 'formAction' && $key !== 'category_id' && $key !== 'product_title' && $value !== null) {
                $attribute =  Attributes::firstOrCreate(['name' => $key]);
                $attribute_id[] =  $attribute['id'];
                $attribute_value[$attribute->id] = $value;
            }
        }

        foreach ($attribute_value as $key => $value) {
            $this->attributeValuesRepo->create(
                [
                    'product_id' => $productId,
                    'attribute_id' => $key,
                    'attribute_value' => $value,
                ]
            );
        }
    }
}
