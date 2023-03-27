<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\ProductRepository;
use App\Repository\ProductVariableRepository;

class ProductViewController extends Controller
{
    private $productRepository;
    private $productVariableRepository;

    public function __construct(ProductRepository $productRepository,
    ProductVariableRepository $productVariableRepository)
    {
        $this->productRepository = $productRepository;
        $this->productVariableRepository = $productVariableRepository;
    }


    public function show(Request $req)
    {
        $productSlug = $req->slug;
        $thisProduct = $this->productRepository->getBySlug($productSlug);
        $hehe= $this->productVariableRepository->getById($thisProduct['id']);
        dd($hehe);       
        return view('admin.ProductView', ['thisProduct' => $thisProduct]);
    }
}
