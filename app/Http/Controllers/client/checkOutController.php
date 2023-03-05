<?php


namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class checkOutController extends Controller
{
    public function getCheckOut(){
        return view('client.checkOut');
    }
}
