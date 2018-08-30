<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    // public function redirectTo(){

    //     foreach (Auth::user()->roles as $role) {
    //         $role->name;
    //     }
    //     // User role
    //     $role = $role->name; 
        
    //     // Check user role
    //     switch ($role) {
    //         case 'administrator':
    //                 return '/admin/story';
    //             break;
    //         case 'author':
    //                 return '/home';
    //             break; 
    //         default:
    //                 return '/login'; 
    //             break;
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
