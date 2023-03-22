<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductsHandleService;

class productHandleController extends Controller
{
    private $productsHandleService;

    public function __construct(ProductsHandleService $productsHandleService)
    {
        $this->productsHandleService = $productsHandleService;
    }

    public function getProductHandle()
    {
        $allProducts = $this->productsHandleService->getAllProducts();
        return view('admin.productHandle', ['allProducts' => $allProducts]);
    }
}
