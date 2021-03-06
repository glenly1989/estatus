<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if(!$user){
            return view('auth.login');
        }

        else{
            if($user->hasAnyRole('Super')){

                return redirect('/super');

            } elseif(Auth::user()->hasAnyRole('Admin')){
                
                return redirect('/admin');

            } elseif(Auth::user()->hasAnyRole('Director')){

                return redirect('/director');

            } elseif(Auth::user()->hasAnyRole('Manager')){

                return redirect('/manager');

            } elseif(Auth::user()->hasAnyRole('Agent')){

                return redirect('/agent');

            } else{
                
                return redirect('/driver');

            }
        }        
        
    }
}
