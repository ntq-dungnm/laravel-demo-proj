<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class orderHandleController extends Controller
{
    public function getOrderHandle(){
        return view('admin.orderHandle');
    }
}
