<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\CategoriesService;
use Illuminate\Http\Request;


class addProductController extends Controller
{
    private $productService;
    private $categoryService;

    public function __construct(
        ProductService $productService,
        CategoriesService $categoriesService
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoriesService;
    }

    public function show()
    {
        $allCategories = $this->categoryService->getAll();
        return view('admin.addProduct', ['allCategories' => $allCategories]);
    }

    public function store(Request $req)
    {

        $product = $req->all();
        $variations = [];

        foreach ($product as $key => $value) {
            if (strpos($key, 'variations_') !== false) {
                $variations[$key] = json_decode($value, true);
                unset($product[$key]);
                if (strpos($key, 'variations_') !== false && strpos($key, '_img') !== false) {
                    $variable_img = $value;
                    $variations_key = str_replace('_img', '', $key);
                    $variations[$variations_key]['variable_img'] = $variable_img;
                    unset($variations[$key]);
                }
            }
        }
        $this->productService->addProduct($product, $variations);
    }
}
