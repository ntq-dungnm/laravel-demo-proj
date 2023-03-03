<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class orderDetailsController extends Controller
{
    public function getOrderDetails(){
        return view('admin.orderDetails');
    }
}
