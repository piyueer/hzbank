<?php

namespace App\Http\Controllers\Admin;

use DB,Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
		view()->share('data', 'Chart');
	}

	public function getBeforeindex()
	{
		return view('Chart.before_chart');
	}

	public function getAfterindex()
	{
		return view('Chart.after_chart');
	}

	public function postBeforeindex()
	{
		//print_r($_POST);exit;
		$result = DB::table('query_history_before')->join('user_before', 'query_history_before.uid', '=', 'user_before.id')
			->select('query_history_before.compositeScore','query_history_before.id','query_history_before.queryTime',
				'user_before.customerName','user_before.cardID','user_before.authCode','query_history_before.uid')->get();
		if(!empty($_POST['customerName'])){
			$customerName = $_POST['customerName'];
			$result_arr = array();
			foreach($result as $k => $v){
				if($v->customerName == $customerName){
					$result_arr[] = $result[$k];
				}
			}
			$result = $result_arr;
		}
		if(!empty($_POST['cardID'])){
			$cardID = $_POST['cardID'];
			$result_arr = array();
			foreach($result as $k => $v){
				if($v->cardID == $cardID){
					$result_arr[] = $result[$k];
				}
			}
			$result = $result_arr;
		}
		if(!empty($_POST['startTime'])){
			$startTime = strtotime($_POST['startTime']);
			$result_arr = array();
			foreach($result as $k => $v){
				if($v->queryTime > $startTime){
					$result_arr[] = $result[$k];
				}
			}
			$result = $result_arr;
		}
		if(!empty($_POST['endTime'])){
			$endTime = strtotime($_POST['endTime']);
			$result_arr = array();
			foreach($result as $k => $v){
				if($v->queryTime < $endTime){
					$result_arr[] = $result[$k];
				}
			}
			$result = $result_arr;
		}
		$result_arr_male = array();
		$result_arr_female = array();
		foreach($result as $k => $v){
			if(strlen($v->cardID) == 18){
				$cardID = substr($v->cardID,'-2','1');
				if($cardID%2 == 1){
					$result_arr_male[] = $result[$k];
				}else{
					$result_arr_female[] = $result[$k];
				}
			}
			if(strlen($v->cardID) == 15){
				$cardID = substr($v->cardID,'-1','1');
				if($cardID%2 == 1){
					$result_arr_male[] = $result[$k];
				}else{
					$result_arr_female[] = $result[$k];
				}
			}
		}
		if($_POST['gender'] == 'male'){
			$result = $result_arr_male;
		}
		if($_POST['gender'] == 'female'){
			$result = $result_arr_female;
		}
		//print_r($result);exit;
		$gender = $_POST['gender'];
		return view('Chart.before_chart',['result'=>$result,'gender'=>$gender]);
	}

	public function postAfterindex()
	{
		//print_r($_POST);exit;
		$result = DB::table('query_history_after')->join('user_after', 'query_history_after.uid', '=', 'user_after.id')
			->select('query_history_after.compositeScore','query_history_after.id','query_history_after.queryTime',
				'user_after.customerName','user_after.cardID','user_after.authCode','query_history_after.uid')->get();
		if(!empty($_POST['customerName'])){
			$customerName = $_POST['customerName'];
			$result_arr = array();
			foreach($result as $k => $v){
				if($v->customerName == $customerName){
					$result_arr[] = $result[$k];
				}
			}
			$result = $result_arr;
		}
		if(!empty($_POST['cardID'])){
			$cardID = $_POST['cardID'];
			$result_arr = array();
			foreach($result as $k => $v){
				if($v->cardID == $cardID){
					$result_arr[] = $result[$k];
				}
			}
			$result = $result_arr;
		}
		if(!empty($_POST['startTime'])){
			$startTime = strtotime($_POST['startTime']);
			$result_arr = array();
			foreach($result as $k => $v){
				if($v->queryTime > $startTime){
					$result_arr[] = $result[$k];
				}
			}
			$result = $result_arr;
		}
		if(!empty($_POST['endTime'])){
			$endTime = strtotime($_POST['endTime']);
			$result_arr = array();
			foreach($result as $k => $v){
				if($v->queryTime < $endTime){
					$result_arr[] = $result[$k];
				}
			}
			$result = $result_arr;
		}
		$result_arr_male = array();
		$result_arr_female = array();
		foreach($result as $k => $v){
			if(strlen($v->cardID) == 18){
				$cardID = substr($v->cardID,'-2','1');
				if($cardID%2 == 1){
					$result_arr_male[] = $result[$k];
				}else{
					$result_arr_female[] = $result[$k];
				}
			}
			if(strlen($v->cardID) == 15){
				$cardID = substr($v->cardID,'-1','1');
				if($cardID%2 == 1){
					$result_arr_male[] = $result[$k];
				}else{
					$result_arr_female[] = $result[$k];
				}
			}
		}
		if($_POST['gender'] == 'male'){
			$result = $result_arr_male;
		}
		if($_POST['gender'] == 'female'){
			$result = $result_arr_female;
		}
		$gender = $_POST['gender'];
		//print_r($result);exit;
		return view('Chart.after_chart',['result'=>$result,'gender'=>$gender]);
	}

}