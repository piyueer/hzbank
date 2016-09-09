<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
	{
		header("Content-type:text/html;charset=utf-8");
	}

	public function check_login()
    {
    	if(Session::has('name')){
    		
    	}else{
    		echo "<script>alert('还未登陆~');location.href='".url('Login/login')."';</script>";exit;
    	}
    }

}
