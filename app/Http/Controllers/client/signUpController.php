<?php


namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

class signUpController extends Controller
{
    private $users = array();
    public function getSignUp()
    {
        return view('client.signUp');
    }

    public function postSignUp(Request $req)
    {
        $rules = [
            'email' => 'required|email',
            'userName'  => 'required',
            'password'  => 'min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/|required'
        ];
        $messages = [
            'required' => 'This field is required',
            'password.regex'    => 'Password must be at least 8 characters,containing at least 1 uppcercase character,1 lowercase character'
        ];
        $req->validate($rules, $messages);

        Session::put($req->userName);
        Session::put(bcrypt($req->password));

        return redirect()->route('sign.in');
    }
}
