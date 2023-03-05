<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productHandleController extends Controller
{
    public function getProductHandle(){
        return view('admin.productHandle');
    } 
   
}
