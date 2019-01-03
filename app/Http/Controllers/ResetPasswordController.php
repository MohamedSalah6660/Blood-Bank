<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;
use Password;
use Illuminate\Http\Request;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = 'client/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('client.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }



    public function __construct()
    {
        $this->middleware('guest:web-client');
    }
    protected function guard(){

    return Auth::guard('web-client');

    }


    protected function broker(){

        return Password::broker('clients');


    }


}
