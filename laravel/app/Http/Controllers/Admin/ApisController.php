<?php

namespace App\Http\Controllers\Admin;

use DB,Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApisController extends Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
		view()->share('data', 'Apis');
	}


	public function getIndex()
	{
		return view('Apis.apis');
	}



}