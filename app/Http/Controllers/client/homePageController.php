<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homePageController extends Controller
{
    public function getHomePage()
    {
        return view('client.homePage');
    }
}
