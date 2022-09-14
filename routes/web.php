<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\IncomingStudentsController;
use App\Http\Controllers\AuthorizeController;
use App\Http\Controllers\ProgramHeadController;
use App\Http\Controllers\SemestersController;
use App\Http\Controllers\StudentsController;
<<<<<<< HEAD
use App\Http\Controllers\AllumniController;
=======
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
<<<<<<< HEAD
use App\Http\Controllers\Auth\RegisterController;

Route::get('/clear-cache',function(){
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE';
});
Route::get('/', [LoginController::class,'showLoginForm'])->name('login');
Route::get('/choose',[AuthorizeController::class,'choose']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/userlogin',[LoginController::class, 'login'])->name('userlogin');
Route::post('/userregister',[RegisterController::class, 'register'])->name('userregister');
Route::get('/welcome',function(){ return view('incomingstudents.welcome'); });
Route::get('/search',function(){ return view('incomingstudents.search'); });
Route::controller(StudentsController::class)->group(function(){
    Route::post('/upl_stud_csv','uploadStudent')->name('stud_csv');
    Route::post('/getGrade','getGrade')->name('getGrade');
});
Route::resource('/enroll', IncomingStudentsController::class);
Route::controller(AllumniController::class)->group(function(){
    Route::post('/Province','returnProvince')->name('getProv');
    Route::post('/City','returnCity')->name('getCity');
    Route::post('/Barangay','returnBrgy')->name('getBrgy');
    Route::post('/injob','insertJob')->name('injob');
});
Route::controller(IncomingStudentsController::class)->group(function(){
    Route::post('/upreq','uploadreq')->name('uploadreq');
    Route::post('/searchTicket','searchticket');
    Route::get('/studentform/{type}','studentform')->name('studentform');
    Route::post('/stop','StopNum')->name('stop');
    Route::post('/getnum','GetNum')->name('getnum');
    Route::post('/acceptConsent','accept')->name('acceptConsent');
    Route::post('/storeStud','store')->name('studIn');
});
Route::get('/forgot-password', function () {
    return view('auth.passwords.forgot-password');
})->middleware('guest')->name('password.request');
Route::resource('/{request}',AuthorizeController::class);
// Route::post('/upreq',[IncomingStudentsController::class, 'uploadreq'])->name('uploadreq');
// Route::post('/searchTicket',[IncomingStudentsController::class, 'searchticket']);
// Route::get('/studentform/{type}',[IncomingStudentsController::class,'studentform'])->name('studentform');
// Route::post('/stop',[IncomingStudentsController::class,'StopNum'])->name('stop');
// Route::post('/getnum',[IncomingStudentsController::class,'GetNum'])->name("getnum");

// Route::get('/sample',[IncomingStudentsController::class, 'showView']);
// Route::group(['middleware'=> 'auth'], function(){
// 	Route::get('auth/{type}',[AuthorizeController::class, 'index']);
// });
// Auth::routes();
// Route::resource('/admin', 'HomeController')->name('dashboard');
// Route::post('/home', 'App\Http\Controllers\HomeController@add')->name('dashboard.add');

//  Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('incoming/incoming-students', IncomingStudentsController::class);
// 	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
// 	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// 	Route::resource('/semesters', SemestersController::class);
// 	Route::resource('/students', StudentsController::class);
// 	Route::resource('/employees', EmployeesController::class);
// 	Route::resource('/program-head', ProgramHeadController::class);
// 	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
// });
=======
use App\Http\Controllers\UserController;
use App\Models\IncomingStudent;

// Route::get('/',[AuthorizeController::class,'login'])->name('login');
Route::get('/choose',[AuthorizeController::class,'choose'])->name('choose');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
// Route::post('/userlogin',[LoginController::class, 'login'])->name('userlogin');
// Route::post('storeStud',[IncomingStudentsController::class, 'store'])->name('studIn');
// Route::get('/welcome',function(){ return view('incomingstudents.welcome'); });
// Route::get('/search',function(){ return view('incomingstudents.search'); });
// Route::resource('/enroll', IncomingStudentsController::class);
// Route::get('/studentform/{type}',[IncomingStudentsController::class,'studentform'])->name('studentform');
// Route::post('/stop/{key}/{type}',[IncomingStudentsController::class,'StopNum']);
// Route::post('/getnum',[IncomingStudentsController::class,'GetNum'])->name("getnum");
// Route::resource('/{request}',AuthorizeController::class);

Route::get('/', function () {
    return view('auth.login');
});
//Route::get('/pre-register', 'App\Http\Controllers\IncomingStudentsController::class@register');

Route::get('/consent', function(){ return view('incomingstudents/dataconsent');});
Route::get('/identity',function(){return view('incomingstudents/identity');})->name('identity');
Route::post('/loginuser',[LoginController::class, 'login'])->name('userlogin');
Route::get('/studentform/{type}',[IncomingStudentsController::class,'studentform'])->name('studentform');
Auth::routes();
//Route::get('/choose',[HomeController::class,'choose'])->name('choose');
Route::get('/home', [HomeController::class,'index'])->name('dashboard');
Route::post('/home', [HomeController::class,'add'])->name('dashboard.add');

Route::group(['middleware' => 'auth'], function () {
	Route::get('getDesignation', [AuthorizeController::class, 'getDesignation'])->name('getDesignation');

	Route::get('incoming-students/{id}', [IncomingStudentsController::class, 'show'])->name('incoming-student');
	Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::patch('profile/password', [ProfileController::class, 'password'])->name('profile.password');
	
	Route::post('/accept',[StudentsController::class,'accept'])->name('accept');
	Route::post('/advise',[StudentsController::class,'advise'])->name('advise');
	Route::post('/endorse',[StudentsController::class,'endorse'])->name('endorse');
	Route::get('/ajaxIndex',[StudentsController::class,'ajaxIndex'])->name('ajaxIndex');
	Route::post('/updateSchoolID',[StudentsController::class,'updateSchoolID'])->name('updateSchoolID');
	Route::get('/requirements/{id}',[StudentsController::class,'requirements'])->name('requirements');
	Route::get('/checkRequirements/{id}',[StudentsController::class,'checkRequirements'])->name('checkRequirements');
	Route::get('/viewStudent/{id}',[StudentsController::class,'viewStudent'])->name('viewStudent');
	Route::get('/students/assign',[StudentsController::class,'assign'])->name('assign');
	Route::get('/students/assigned',[StudentsController::class,'assigned'])->name('assigned');
	Route::post('/checkFiles',[StudentsController::class,'checkFiles'])->name('checkFiles');	
	Route::get('programList', [StudentsController::class, 'programList'])->name('programList');	

	//Route for EmployeesController
	Route::get('getEmployees', [EmployeesController::class, 'getEmployees'])->name('getEmployees');
	//Route::get('/requirements/accept/{id}',[StudentsController::class,'accept'])->name('accept');

	Route::get('/getUsers', [UserController::class, 'getUsers'])->name('getUsers');
	
	Route::resource('/user', 'UserController');
	Route::resource('/semesters', 'SemestersController');	
	Route::resource('/students', 'StudentsController');	
	Route::resource('/employees', 'EmployeesController');
	Route::resource('/program-head', 'ProgramHeadController');
	Route::get('{page}', [PageController::class, 'index'])->name('page.index');
});
//Route::resource('/enroll', IncomingStudentsController::class);
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
