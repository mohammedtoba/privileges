<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
 Route::get('/vu', function () {
    return view('ControlPanels\vueform');
});
Route::get('/profile', 'MedicalstaffCon@Profile')->name('MSprofile')->middleware('auth');

//Evaluation Template setup
Route::get('/et', 'TemplateCon@evalTemplate')->name('evaltemp')->middleware('auth');
Route::post('/saveTT','TemplateCon@saveTT')->name('saveTT')->middleware('auth');

//Privilege Template setup
Route::group([ 'prefix' => 'privilegetemplate', 'middleware' => ['auth', 'roles'],'roles' => ['root','HOD', 'admin']], function() {
	Route::get('/',  ['as' =>'privtemp','uses'=>'TemplateCon@privTemplate']);

	Route::post('/save','TemplateCon@saveTmplPriv')->name('saveTmplPriv');
	Route::post('/edit/{did}',array('as' => 'editTmplPriv', 'uses' => 'TemplateCon@editTmplPriv' ));
	Route::post('/activate/{did}/{a}',  ['as' =>'activeTmplPriv','uses'=>'TemplateCon@activeTmplPriv']);
	Route::delete('/delete/{did}',array('as' => 'delTmplPriv', 'uses' => 'TemplateCon@delTmplPriv' ));

	Route::post('/saveg','TemplateCon@saveTmplPrivG')->name('saveTmplPrivG');
	Route::post('/editg/{did}',array('as' => 'editTmplPrivG', 'uses' => 'TemplateCon@editTmplPrivG' ));
	Route::post('/activateg/{did}/{a}',  ['as' =>'activeTmplPrivG','uses'=>'TemplateCon@activeTmplPrivG']);
	Route::delete('/deleteg/{did}',array('as' => 'delTmplPrivG', 'uses' => 'TemplateCon@delTmplPrivG' ));
	
	Route::post('/savegd','TemplateCon@saveTmplPrivGD')->name('saveTmplPrivGD');
	Route::post('/editgd/{did}',array('as' => 'editTmplPrivGD', 'uses' => 'TemplateCon@editTmplPrivGD' ));
	Route::post('/activategd/{did}/{a}',  ['as' =>'activeTmplPrivGD','uses'=>'TemplateCon@activeTmplPrivGD']);
	Route::delete('/deletegd/{did}',array('as' => 'delTmplPrivGD', 'uses' => 'TemplateCon@delTmplPrivGD' ));
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@ShowRegForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');

//Medical staff routes
Route::get('/apply', 'MedicalstaffCon@application')->name('MSapply')->middleware('auth');
Route::post('/saveMS','MedicalstaffCon@saveMS')->name('saveMS')->middleware('auth');
/*Route::group([ 'prefix' => 'Mslist', 'middleware' => ['auth', 'roles'],'roles' => ['root','HOD', 'admin']], function() {
	Route::get('/eval',['as'=>'Mslist','uses'=> 'MedicalstaffCon@Mslist']);
});*/


	//Medicl staff qualification
Route::group([ 'prefix' => 'qual', 'middleware' => ['auth', 'roles'],'roles' => ['root','medical', 'HOD']], function() {
	Route::get('/',  array('as' =>'newQual','uses'=>'MedicalstaffCon@newQual'));
	Route::post('/save','MedicalstaffCon@saveQual')->name('saveQual');
	Route::post('/edit/{qid}',array('as' => 'editQual', 'uses' => 'MedicalstaffCon@editQual' ));
	Route::delete('/delete/{qid}',array('as' => 'delQual', 'uses' => 'MedicalstaffCon@delQual' ));
});

//Medicl staff trainig
Route::group([ 'prefix' => 'train', 'middleware' => ['auth', 'roles'],'roles' => ['root','medical', 'HOD']], function() {
	Route::get('/',  array('as' =>'Train','uses'=>'MedicalstaffCon@Train'));
	Route::post('/save','MedicalstaffCon@saveTrain')->name('saveTrain');
	Route::post('/edit/{qid}',array('as' => 'editTrain', 'uses' => 'MedicalstaffCon@editTrain' ));
	Route::delete('/delete/{qid}',array('as' => 'delTrain', 'uses' => 'MedicalstaffCon@delTrain' ));
});

//Medicl staff experiences
Route::group([ 'prefix' => 'exper', 'middleware' => ['auth', 'roles'],'roles' => ['root','medical', 'HOD']], function() {
	Route::get('/',  array('as' =>'Exper','uses'=>'MedicalstaffCon@Exper'));
	Route::post('/save','MedicalstaffCon@saveExper')->name('saveExper');
	Route::post('/edit/{qid}',array('as' => 'editExper', 'uses' => 'MedicalstaffCon@editExper' ));
	Route::delete('/delete/{qid}',array('as' => 'delExper', 'uses' => 'MedicalstaffCon@delExper' ));
});


Route::get('/qual/test',array('as' =>'testQual','uses'=>'MedicalstaffCon@test'));

//just to test the layout
Route::get('/layout', function () {
    return view('layouts.appLayout');
});
//dummy page with sidebar
Route::get('/pp', function () {
    return view('privilegeProcess');
})->middleware('auth');

Route::get('/p', 'MedicalstaffCon@GetNationality')->name('GetNat');
 
 //Department setup
Route::group([ 'prefix' => 'department', 'middleware' => ['auth', 'roles'],'roles' => ['root','HOD', 'admin']], function() {
	Route::get('/',  ['as' =>'Dept','uses'=>'DepartmentCon@Dept']);
	Route::post('/activate/{did}/{a}',  ['as' =>'activeDept','uses'=>'DepartmentCon@activeDept']);
	Route::post('/save','DepartmentCon@saveDept')->name('saveDept');
	Route::post('/edit/{did}',array('as' => 'editDept', 'uses' => 'DepartmentCon@editDept' ));
	Route::delete('/delete/{did}',array('as' => 'delDept', 'uses' => 'DepartmentCon@delDept' ));
});
 //users setup
Route::group([ 'prefix' => 'controlPanel/users', 'middleware' => ['auth', 'roles'],'roles' => ['root','admin','HOD']], function() {
	Route::get('/view',  ['as' =>'viewUsers','uses'=>'ControlPanel\usersCon@view']);
	Route::get('/add/{uid?}',  ['as' =>'addUsers','uses'=>'ControlPanel\usersCon@addUsers']);
	Route::get('/activate/{uid}/{a}',  ['as' =>'activeUser','uses'=>'ControlPanel\usersCon@activeUser']);
	Route::post('/add/',array('as' => 'updateOrCreateUser', 'uses' => 'ControlPanel\usersCon@updateOrCreateUser' ));
});
//Evaluation routes
Route::group([ 'prefix' => 'evaluate', 'middleware' => ['auth', 'roles'],'roles' => ['root','HOD']], function() {
	Route::get('/list',['as'=>'evalList','uses'=> 'EvaluationCon@evalList']);
	Route::get('/history',['as'=>'evalHistory','uses'=> 'EvaluationCon@evalHistory']);
	Route::post('/start',array('as' =>'startEval','uses'=>'EvaluationCon@startEval'));
	Route::get('/{eid}',  array('as' =>'Eval','uses'=>'EvaluationCon@Eval'));
	Route::post('/save',array('as' =>'saveEval','uses'=>'EvaluationCon@saveEval'));
	Route::get('/finalize/{eid}',array('as' => 'finalizeEval', 'uses' => 'EvaluationCon@finalizeEval' ));
	Route::get('/delete/{eid}',array('as' => 'delEval', 'uses' => 'EvaluationCon@delEval' ));
});


//Privileges routes
Route::get('/myreq', 'PrivilegesCon@MyReq')->name('myreq')->middleware('auth');
Route::get('/priv_req', 'PrivilegesCon@priv_req')->name('priv_req')->middleware('auth');
Route::post('saveStfPriv','PrivilegesCon@saveStfPriv')->name('saveStfPriv')->middleware('auth');
//Privileges routes
Route::get('/myreq', 'PrivilegesCon@MyReq')->name('myreq')->middleware('auth');
Route::get('/priv_req', 'PrivilegesCon@priv_req')->name('priv_req')->middleware('auth');
Route::post('saveStfPriv','PrivilegesCon@saveStfPriv')->name('saveStfPriv')->middleware('auth');

Route::group([ 'prefix' => 'privilege', 'middleware' => ['auth', 'roles'] ,'roles' => ['root','medical','HOD','committee']], function() {
Route::get('/new/{medstaff_id}/{privtyp_id}', 'PrivilegesCon@new')->name('new') ;

Route::get('/stflist', 'PrivilegesCon@List')->name('stflist') ;
Route::get('/headlist', 'PrivilegesCon@List')->name('headlist') ;
Route::get('/commlist', 'PrivilegesCon@List')->name('commlist') ;

Route::get('/start/{priv_id}', 'PrivilegesCon@Form')->name('apply') ;
Route::get('/review/{priv_id}', 'PrivilegesCon@Form')->name('recommend') ;
Route::get('/discuss/{priv_id}', 'PrivilegesCon@Form')->name('finalize') ;
Route::get('/show/{priv_id}', 'PrivilegesCon@Form')->name('showPriv') ;

Route::post('/apply', 'PrivilegesCon@Save')->name('savePrivS') ;
Route::post('/recommend', 'PrivilegesCon@Save')->name('savePrivH') ;
Route::post('/finalize', 'PrivilegesCon@Save')->name('savePrivC') ;

//Route::get('/apply/{priv_id}', 'PrivilegesCon@Save')->name('submitPrivS') ;
Route::post('/applyS', 'PrivilegesCon@Submit')->name('submitPrivS') ;
Route::post('/recommendS', 'PrivilegesCon@Submit')->name('submitPrivH') ;
Route::post('/finalizeS', 'PrivilegesCon@Submit')->name('submitPrivC') ;

Route::get('/privlist', 'PrivilegesCon@privlist')->name('privlist') ;


// should be at last routes under privilege 
//Route::get('/{eid}',  array('as' =>'Priv','uses'=>'PrivilegesCon@Priv'));
});	



//admire
Route::get('{name?}','AdmireController@showView');

Route::get('users','AdmireController@index');

Route::post('users','AdmireController@store');
