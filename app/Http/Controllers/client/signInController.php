<?php


namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PDO;
use Session;
use Illuminate\Support\Facades\Hash;

class signInController extends Controller
{
    public function getsignIn()
    {
        return view('client.signIn');
    }

    public function postSignIn(Request $req)
    {
        $rules = [
            'userName' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'required' => 'This field is required',
        ];

        $req->validate($rules, $messages);
        $password = $req->password;
        if ($req->userName == Session::get('userName') && Hash::check($password, Session::get('password'))) {
            return redirect()->route('home-page');
        } else {
            return redirect()->back();
        }
    }
}
