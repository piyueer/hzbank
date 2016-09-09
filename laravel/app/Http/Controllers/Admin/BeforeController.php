<?php

namespace App\Http\Controllers\Admin;

use DB,Session,Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Jobs\TaskBefore;
use App\Libs\Myclass\GetSingleResultBefore;
use App\Libs\Myclass\Tools\ObjectToArray;
use Yajra\Datatables\Datatables;

class BeforeController extends Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
		view()->share('data', 'Before');
	}

	public function getSingleindex()
	{
		return view('Before.before_single');
	}

	public function getTasklist()
	{		
		$result = DB::table('task_list_before as t')
					->join('admin as a','t.aid','=','a.id')
					->select('t.*','a.name')
					->get();
		$result = ObjectToArray::objectToArray($result);	

		foreach($result as &$v)
		{
			if($v['taskStatus'] == '进行中' ){ $v['taskStatusMsg'] = '<div class="text-info">进行中</div>';}
			elseif($v['taskStatus'] == '已完成' ){$v['taskStatusMsg'] = '<div class="text-success">已完成</div>';}
			else{$v['taskStatusMsg'] = '<div class="text-danger">失败了</div>';}
		}	

		return view('Before.task_list')->with('result', $result);
	}
	
	public function postTaskjob()
	{   
		$timeNow=time();
		
		$file = Input::file('excelUpload');
		
		if($file -> isValid()){
			
			$clientName = $file -> getClientOriginalName();
			$tmpName = $file -> getFileName();
			$realPath = $file -> getRealPath();
			$extension = $file -> getClientOriginalExtension(); //上传文件的后缀
			//$mimeTye = $file -> getMimeType();
			
			$excelName = $timeNow.".".$extension;
			$path = $file -> move(app_path().'/storage/uploads',$excelName);
		}
				
		$taskAid = DB::table('admin')
				->where('name','=',$_POST['name'])
				->select('id')
				->first();
				
		$taskAid = ObjectToArray::objectToArray($taskAid);		
		
		$insertResult['aid'] = $taskAid['id']; 	
		$insertResult['taskName'] = $_POST['taskName'];
		$insertResult['startTime'] = $timeNow;
		$insertResult['taskStatus'] = '进行中';
		
		$taskId = DB::table('task_list_before')->insertGetId($insertResult);
		
		$job = (new TaskBefore($excelName,$taskId))->delay(4);
        $this->dispatch($job);
		
		return redirect('Before/tasklist');							
	}

	public function getTaskdelete()
	{   
		$taskId=Input::get('id');
		
		DB::table('task_list_before')
				->where('id','=',$taskId)
				->delete();
		
		return redirect('Before/tasklist');
	}

	public function getTaskdetails()
	{   
		$taskId=Input::get('id');
		
		return view('Before.task_details')->with('taskId', $taskId);
	}
	
	public function anyDataTaskBefore()
	{   
		$taskId = $_GET['taskId'];

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
								->where('taskId','=',$taskId)
								->count();
		
		//定义过滤条件查询过滤后的记录数sql //$sumSqlWhere ="where u.customerName||u.cardID LIKE '%".$search."%'"; 
		if(strlen($search)>0){
			$recordsFiltered = DB::table('user_before as u')
										->join('query_history_before as q','u.id','=','q.uid')
										->select('u.id')
										->where('q.taskId','=',$taskId)
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
									->where('q.taskId','=',$taskId)
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
									->where('q.taskId','=',$taskId)
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
	
	public function postExceldemo()
	{
		$cellData = [['customerName','phoneNumber','cardID','authcode']];
		Excel::create('demo',function($excel) use ($cellData){
			$excel->sheet('Sheet1', function($sheet) use ($cellData){
			$sheet->rows($cellData);
			});
		})->export('xlsx');
	}
	
	public function getSingledetails()
	{  
		$uid=Input::get('uid');

		$res = DB::table('query_history_before as q')
						->join('user_before as u','u.id','=','q.uid')
						->select('u.*')
						->where('q.uid','=',$uid)
						->first();
		
		$res = ObjectToArray::objectToArray($res);
		
		$result = GetSingleResultBefore::getSingleResult($res['customerName'],$res['cardID'],$res['phoneNumber'],$res['authcode'],true);
		
		return view('Before.before_single_result')->with('result', $result);
	}

	public function postSingleresult()
	{   
		$result = GetSingleResultBefore::getSingleResult($_REQUEST['customerName'],$_REQUEST['cardID'],$_REQUEST['phoneNumber'],$_REQUEST['authcode'],true);
		//print_r($result);die();
		return view('Before.before_single_result')->with('result', $result); 
	}

}