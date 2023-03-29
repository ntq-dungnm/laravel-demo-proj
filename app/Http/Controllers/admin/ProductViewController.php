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

    public function __construct(
        ProductRepository $productRepository,
        ProductVariableRepository $productVariableRepository
    ) {
        $this->productRepository = $productRepository;
        $this->productVariableRepository = $productVariableRepository;
    }


    public function show(Request $req)
    {
        $productSlug = $req->slug;
        $thisProduct = $this->productRepository->getBySlug($productSlug);
        $hehe = $this->productVariableRepository->getById($thisProduct['id'])->first();
        $productVariables = $hehe->variables->toArray();
        $finalVariables = [];
        foreach ($productVariables as $key => $values) {
            foreach ($values['attributes'] as $item) {
                $finalVariables[$key][$item['values']['attribute']['name']] = $item['   values']['value'];
            }
            $finalVariables[$key]['image'] = $values['image'];
            $finalVariables[$key]['regular_price'] = $values['regular_price'];
        }
        return view('admin.ProductView', ['thisProduct' => $hehe, 'productVariables' => $finalVariables]);
    }
}
