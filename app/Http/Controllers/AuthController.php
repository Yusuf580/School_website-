<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //Responsible for hashing the password
    public function login(){
        //dd(Hash::make(123456));
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashboard');
            }
            elseif(Auth::user()->user_type == 3)
            {
                return redirect('student/dashboard');              
            }
            elseif(Auth::user()->user_type == 4)
            {
                return redirect('librarian/dashboard');                
            }
        }
        return view('auth.login');
    }
    //Validating login
    public function AuthLogin(Request $request){
        $remember = !empty($request->remember) ? true : false;
        
        // Correct the `Auth::attempt` method by removing the third `true` from the array
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashboard');
            }
            elseif(Auth::user()->user_type == 3)
            {
                return redirect('student/dashboard');              
            }
            elseif(Auth::user()->user_type == 4)
            {
                return redirect('librarian/dashboard');                
            }
            
            
        }
        else
        {
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
    
}
