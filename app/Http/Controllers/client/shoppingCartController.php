<?php


namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class shoppingCartController extends Controller
{
    public function getShoppingCart(){
        return view('client.shoppingCart');
    }

    

}
