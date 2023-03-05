<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class addProductController extends Controller
{
    public function getAddProduct()
    {
        return view('admin.addProduct');
    }

}
