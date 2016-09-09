<?php

namespace App\Http\Controllers\Admin;

use DB,Session;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

	public function getLogin()
	{
		return view('Login.login');
	}


	public function postLogin()
	{
		$password = crypt(($_POST['password']),'$6worksat$');
		$result = DB::table('admin')->where('username',($_POST['username']))
			->where('password',$password)->first();
		if($result){
			if(!empty($_POST['checked'])){
				setcookie('username', $_POST['username'],time()+3600*24);
				setcookie('password', $_POST['password'],time()+3600*24);
			}else{
				setcookie('username', '',time()-3600*24);
				setcookie('password', '',time()-3600*24);
			}
			Session::put('name',($result->name));
			return redirect('Home/index');
		}
		echo '<script>alert("用户名或密码错误")</script>';
		return view('Login.login');
	}


	public function getLogout()
	{
		Session::forget('name');
		return redirect('Login/login');
	}

}