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
                $finalVariables[$item['values']['attribute']['name']] = $item['values']['value'];
            }
        }
        dd($finalVariables);
        // foreach ($productVariables as $key => $value) {
        //     dd($value->attributes['0']['values']);
        // }
        // dd($productVariables['0']['attributes']['0']['values']['value']);
        // $variablesAttributes = $productVariables->attributes;
        // dd($variablesAttributes);
        // dd($variablesAttributes->first()->values->first()); 
        // dd($productVariables->first()->attributes->first()->values->first());
        // dd($productVariables->first()->attributes->first()->attribute_value_id);
        return view('admin.ProductView', ['thisProduct' => $hehe, 'productVariables' => $productVariables]);
    }
}
