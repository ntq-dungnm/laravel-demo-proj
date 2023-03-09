<?php


namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Repository\userRepository;
use App\Repository\userRepository as RepositoryUserRepository;
use Session;

class signUpController extends Controller
{
    // private $users = array();

    // public function __construct(UserRepository $userRepository)
    // {
    //     $this->userRepository = $userRepository;
    // }

    public function getSignUp()
    {
        return view('client.signUp');
    }

    public static function postSignUp(Request $req)
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

        $email = $req->email;
        $fullName = $req->userName;
        $password = bcrypt($req->password);

        $user = [
            'fullName' => $fullName
            , 'email' => $email
            , 'password' => $password
        ];

        RepositoryUserRepository::create($user);

        return redirect()->route('sign.in');
    }
}
