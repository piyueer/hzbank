<?php

namespace App\Http\Controllers\Admin;

use DB,Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagersController extends Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
		view()->share('data', 'Managers');
	}


	public function getIndex()
	{
		$result = DB::table('admin')->paginate('8');
		return view('Managers.managers',['result'=>$result]);
	}


	public function getInsert()
	{
		return view('Managers.managers_add');
	}


	public function postInsert(Request $request)
	{
		$user = DB::table('admin')->where('username',($_POST['username']))->first();
		if($request->ajax()){
			if($user){
				return 'true';
			}else{
				return 'false';
			}
		}
		if($user){
			echo '<script>alert("该用户名已存在")</script>';
			return view('Managers.managers_add');exit;
		}else{
			$password = crypt(($_POST['password']),'$6worksat$');
			$result = DB::table('admin')->insert([
				'name' => ($_POST['name']),
				'username' => ($_POST['username']),
				'password' => $password,
				'department' => ($_POST['department'])
			]);
		}
		return redirect('Managers/index');
	}


	public function getUpdate($id)
	{
		$result = DB::table('admin')->where('id',$id)->first();
		return view('Managers.managers_update',['result'=>$result]);
	}


	public function postUpdate($id)
	{
		$password = crypt(($_POST['password']),'$6worksat$');
		$result = DB::table('admin')->where('id',$id)->update([
			'password' => $password,
			'department' => ($_POST['department'])
		]);
		return redirect('Managers/index');
	}


	public function getDelete($id)
	{
		$result = DB::table('admin')->where('id',$id)->delete();
		return redirect('Managers/index');
	}

}