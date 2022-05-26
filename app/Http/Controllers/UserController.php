<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct(){
    	@session_start();
    }

    public function admin(){
        return view('/login');
    }
    public function getLogin(){
    	return view('auth.login');
    }

    public function postLogin(Request $requets){
    	if ($requets ->username == '' || $requets ->password =='') 
    	{
    		return redirect('/login')->with('notice', 'Tài khoản hoặc mật khẩu không được để trống.');
    	}
    	  if (Auth::attempt(['username' => $requets->username, 'password' => $requets->password]))
        {
            return redirect('/admin/home');
        }
        else{
        	return redirect('/login')->with('notice', 'Tài khoản hoặc mật khẩu không chính xác, vui lòng thử lại');
        }
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect('/login');
    }
}
