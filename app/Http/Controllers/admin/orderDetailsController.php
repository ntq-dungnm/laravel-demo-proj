<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class orderDetailsController extends Controller
{
    public function getOrderDetails()
    {
        $products = [
            '0' => [
                'price' => 119.99,
                'color' => 'Pink',
                'size'  => 'M',
                'quantity' => 2,
            ],
            '1' => [
                'price' => 24.99,
                'color' => 'White',
                'size' => '350ml',
                'quantity' => 1,
            ],
            '2' => [
                'price' => 94.99,
                'color' => 'Black',
                'size' => '32.5mm',
                'quantity' => 1,

            ]
        ];
        $allProduct = !(Session::get('product')) ? Session::put('product', $products) : Session::get('product');
        dd($allProduct);
        return view('admin.orderDetails', compact('allProduct'));
    }
}
