<?php

namespace App\Http\Controllers\Admin;

use DB,Session;
use App\Http\Controllers\Controller;
use App\Libs\Myclass\Tools\ObjectToArray;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
		view()->share('data', 'Home');
	}


	public function getIndex()
	{
		$passed = 60;
		$startTime = strtotime(date("Ymd"));
		
		//贷前
		$result_before = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*7, $startTime])->count();
		$result_before_error = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*7, $startTime])
			->where('compositeScore', '<', $passed)->count();
		$result_before_1 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*7, $startTime-3600*24*6])->count();
		$result_before_2 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*6, $startTime-3600*24*5])->count();
	    $result_before_3 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*5, $startTime-3600*24*4])->count();
	    $result_before_4 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*4, $startTime-3600*24*3])->count();
	    $result_before_5 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*3, $startTime-3600*24*2])->count();
	    $result_before_6 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*2, $startTime-3600*24])->count();
	    $result_before_7 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24, $startTime])->count();
	    
	    $result_before_error_1 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*7, $startTime-3600*24*6])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_before_error_2 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*6, $startTime-3600*24*5])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_before_error_3 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*5, $startTime-3600*24*4])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_before_error_4 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*4, $startTime-3600*24*3])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_before_error_5 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*3, $startTime-3600*24*2])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_before_error_6 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24*2, $startTime-3600*24])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_before_error_7 = DB::table('query_history_before')->whereBetween('queryTime', [$startTime-3600*24, $startTime])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_before_all = json_encode([
	    	'result_before_1'=>$result_before_1,'result_before_2'=>$result_before_2,
    		'result_before_3'=>$result_before_3,'result_before_4'=>$result_before_4,
    		'result_before_5'=>$result_before_5,'result_before_6'=>$result_before_6,
    		'result_before_7'=>$result_before_7,'result_before_error_1'=>$result_before_error_1,
    		'result_before_error_2'=>$result_before_error_2,'result_before_error_3'=>$result_before_error_3,
    		'result_before_error_4'=>$result_before_error_4,'result_before_error_5'=>$result_before_error_5,
    		'result_before_error_6'=>$result_before_error_6,'result_before_error_7'=>$result_before_error_7
    		]);

		//贷后
		$result_after = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*7, $startTime])->count();
		$result_after_error = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*7, $startTime])
			->where('compositeScore', '<', $passed)->count();
		$result_after_1 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*7, $startTime-3600*24*6])->count();
		$result_after_2 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*6, $startTime-3600*24*5])->count();
	    $result_after_3 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*5, $startTime-3600*24*4])->count();
	    $result_after_4 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*4, $startTime-3600*24*3])->count();
	    $result_after_5 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*3, $startTime-3600*24*2])->count();
	    $result_after_6 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*2, $startTime-3600*24])->count();
	    $result_after_7 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24, $startTime])->count();
	    
	    $result_after_error_1 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*7, $startTime-3600*24*6])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_after_error_2 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*6, $startTime-3600*24*5])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_after_error_3 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*5, $startTime-3600*24*4])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_after_error_4 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*4, $startTime-3600*24*3])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_after_error_5 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*3, $startTime-3600*24*2])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_after_error_6 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24*2, $startTime-3600*24])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_after_error_7 = DB::table('query_history_after')->whereBetween('queryTime', [$startTime-3600*24, $startTime])
	    	->where('compositeScore', '<', $passed)->count();
	    $result_after_all = json_encode([
	    	'result_after_1'=>$result_after_1,'result_after_2'=>$result_after_2,
    		'result_after_3'=>$result_after_3,'result_after_4'=>$result_after_4,
    		'result_after_5'=>$result_after_5,'result_after_6'=>$result_after_6,
    		'result_after_7'=>$result_after_7,'result_after_error_1'=>$result_after_error_1,
    		'result_after_error_2'=>$result_after_error_2,'result_after_error_3'=>$result_after_error_3,
    		'result_after_error_4'=>$result_after_error_4,'result_after_error_5'=>$result_after_error_5,
    		'result_after_error_6'=>$result_after_error_6,'result_after_error_7'=>$result_after_error_7
    		]);

		return view('Home.index',['result_before'=>$result_before,'result_before_error'=>$result_before_error,'result_before_all'=>$result_before_all,'result_after'=>$result_after,'result_after_error'=>$result_after_error,'result_after_all'=>$result_after_all]);
	}
	
	public function getLastweekbefore()
	{
		return view('Home.last_week_before');
	}
	
	public function anyDataWeekBefore()
	{
		//当前时间减去一周
		$timeLastweek=strtotime("-1 week");
		
		//获取参数 
		$draw = $_GET['draw'];
		 
		//排序
		$order_column = $_GET['order']['0']['column'];
		$order_dir = $_GET['order']['0']['dir'];

		
		//搜索
		$search = $_GET['search']['value'];
		 
		//分页
		$start = $_GET['start'];
		$length = $_GET['length'];
		$limitSql = '';
		$limitFlag = isset($_GET['start']) && $length != -1 ;
		if ($limitFlag ) {
			$limitSql = " LIMIT ".intval($start).", ".intval($length);
		}
		 
		
		//条件过滤后记录数 
		$recordsFiltered = 0;
		//表的总记录数 
		$recordsTotal = 0;
		$recordsTotal = DB::table('query_history_before')
								->select('id')
								->count();
		
		
		
		//定义过滤条件查询过滤后的记录数sql //$sumSqlWhere ="where u.customerName||u.cardID LIKE '%".$search."%'"; 
		if(strlen($search)>0){
			$recordsFiltered = DB::table('user_before as u')
										->join('query_history_before as q','u.id','=','q.uid')
										->select('u.id')
										->where('u.cardID','like','%'.$search.'%')
										->count();
		}else{
			$recordsFiltered = $recordsTotal;
		}
		 
		//query data
		$infos = array();
		if(strlen($search)>0){
			//如果有搜索条件，按条件过滤找出记录
			$dataResult = DB::table('user_before as u')
									->join('query_history_before as q','u.id','=','q.uid')
									->select('u.customerName','u.cardID','q.compositeScore','q.uid')
									->where('q.queryTime','>',$timeLastweek)
									->where('u.cardID','like','%'.$search.'%')
									->orderBy('q.compositeScore',$order_dir)
									->skip($start)
									->take($length)
									->get();
			
			$dataResult = ObjectToArray::objectToArray($dataResult);
			
			foreach ($dataResult as $row) {
				$obj = array($row['customerName'], $row['cardID'], $row['compositeScore'], $row['uid']);
				array_push($infos,$obj);
			}
		}else{
			//直接查询所有记录
			$dataResult = DB::table('user_before as u')
									->join('query_history_before as q','u.id','=','q.uid')
									->select('u.customerName','u.cardID','q.compositeScore','q.uid')
									->where('q.queryTime','>',$timeLastweek)
									->orderBy('q.compositeScore',$order_dir)
									->skip($start)
									->take($length)
									->get();
			
			$dataResult = ObjectToArray::objectToArray($dataResult);
			
			foreach ($dataResult as $row) {
				$obj = array($row['customerName'], $row['cardID'], $row['compositeScore'], $row['uid']);
				array_push($infos,$obj);
			}
		}
		 
		//输出
		return json_encode(array(
			"draw" => intval($draw),
			"recordsTotal" => intval($recordsTotal),
			"recordsFiltered" => intval($recordsFiltered),
			"data" => $infos
		),JSON_UNESCAPED_UNICODE);
		
	}
	
	public function getLastweekafter()
	{
		return view('Home.last_week_after');
	}
	
	public function anyDataWeekAfter()
	{
		//当前时间减去一周
		$timeLastweek=strtotime("-1 week");
		
		//获取参数
		$draw = $_GET['draw'];
		 
		//排序
		$order_column = $_GET['order']['0']['column'];
		$order_dir = $_GET['order']['0']['dir'];

		
		//搜索
		$search = $_GET['search']['value'];
		 
		//分页
		$start = $_GET['start'];
		$length = $_GET['length'];//
		$limitSql = '';
		$limitFlag = isset($_GET['start']) && $length != -1 ;
		if ($limitFlag ) {
			$limitSql = " LIMIT ".intval($start).", ".intval($length);
		}
		 
		
		//条件过滤后记录数 
		$recordsFiltered = 0;
		//表的总记录数
		$recordsTotal = 0;
		$recordsTotal = DB::table('query_history_after')
								->select('id')
								->count();
		
		
		
		//定义过滤条件查询过滤后的记录数sql //$sumSqlWhere ="where u.customerName||u.cardID LIKE '%".$search."%'"; 
		if(strlen($search)>0){
			$recordsFiltered = DB::table('user_after as u')
										->join('query_history_after as q','u.id','=','q.uid')
										->select('u.id')
										->where('u.cardID','like','%'.$search.'%')
										->count();
		}else{
			$recordsFiltered = $recordsTotal;
		}
		 
		//query data
		$infos = array();
		if(strlen($search)>0){
			//如果有搜索条件，按条件过滤找出记录
			$dataResult = DB::table('user_after as u')
									->join('query_history_after as q','u.id','=','q.uid')
									->select('u.customerName','u.cardID','q.compositeScore','q.uid')
									->where('q.queryTime','>',$timeLastweek)
									->where('u.cardID','like','%'.$search.'%')
									->orderBy('q.compositeScore',$order_dir)
									->skip($start)
									->take($length)
									->get();
			
			$dataResult = ObjectToArray::objectToArray($dataResult);
			
			foreach ($dataResult as $row) {
				$obj = array($row['customerName'], $row['cardID'], $row['compositeScore'], $row['uid']);
				array_push($infos,$obj);
			}
		}else{
			//直接查询所有记录
			$dataResult = DB::table('user_after as u')
									->join('query_history_after as q','u.id','=','q.uid')
									->select('u.customerName','u.cardID','q.compositeScore','q.uid')
									->where('q.queryTime','>',$timeLastweek)
									->orderBy('q.compositeScore',$order_dir)
									->skip($start)
									->take($length)
									->get();
			
			$dataResult = ObjectToArray::objectToArray($dataResult);
			
			foreach ($dataResult as $row) {
				$obj = array($row['customerName'], $row['cardID'], $row['compositeScore'], $row['uid']);
				array_push($infos,$obj);
			}
		}
		 
		//输出
		return json_encode(array(
			"draw" => intval($draw),
			"recordsTotal" => intval($recordsTotal),
			"recordsFiltered" => intval($recordsFiltered),
			"data" => $infos
		),JSON_UNESCAPED_UNICODE);
		
	}


}