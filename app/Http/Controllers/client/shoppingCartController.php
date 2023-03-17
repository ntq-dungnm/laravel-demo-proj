<?php


namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class shoppingCartController extends Controller
{
    public function getShoppingCart()
    {
        return view('client.shoppingCart');
    }

    public function handleProduct(Request $req)
    {
        $data = $req->all();
        Session::put('product', $data);
        $respone = 'hehe';
        return $respone;
    }
}
