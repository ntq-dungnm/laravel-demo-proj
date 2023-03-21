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
        foreach ($product as $key => $value) {
            if (strpos($key, 'variations_') !== false) {
                unset($product[$key]);
                $variations[$key] = json_decode($value, true);
            }
        }
        // $product['variables'] = $variations;
        // dd($product,$variations);

        $this->productService->addProduct($product,$variations); 
    }
}
