<?php


namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'required' => 'This field ais required',
        ];

        $req->validate($rules, $messages);
        $password = $req->password;

        $user = [
            'email' => $req->userName,
            'password' => $req->password,
        ];

        if (Auth::attempt($user)) {
            return redirect()->route('home-page');
        } else {
            return redirect()->back();
        }
    }
}
