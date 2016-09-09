<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['namespace' => 'Admin','middleware' => ['web']]  ,function () {
	Route::controller('Login', 'LoginController');
	Route::controller('Home', 'HomeController',[
    'anyDataWeekBefore'  => 'datatables.lastweekdatabefore',
	'anyDataWeekAfter'  => 'datatables.lastweekdataafter'
	]);
	Route::controller('Managers', 'ManagersController');
	Route::controller('Before', 'BeforeController',[
    'anyDataTaskBefore'  => 'datatables.taskdatabefore'
	]);
	Route::controller('After', 'AfterController',[
    'anyDataTaskAfter'  => 'datatables.taskdataafter'
	]);
	Route::controller('Chart', 'ChartController');
	Route::controller('Apis', 'ApisController');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
});
