<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkloginadmin;

Route::get('/', [HomeController::class,'index']);
Route::get('/index', [HomeController::class,'index']);
Route::get('/aboutus', [HomeController::class,'aboutus']);
Route::get('/calendar', [HomeController::class,'calendar']);
Route::get('/contactus', [HomeController::class,'contactus']);
Route::get('/css', [HomeController::class,'css']);
Route::get('/html', [HomeController::class,'html']);
Route::get('/js', [HomeController::class,'js']);
Route::get('/php', [HomeController::class,'php']);
Route::get('/signin', [HomeController::class,'signin']);
Route::get('/signup', [HomeController::class,'signup']);

Route::match(['get','post'],'/adminpanel/index', [AdminController::class,'login']);
Route::match(['get','post'],'/adminpanel', [AdminController::class,'login']);
Route::match(['get','post'],'/adminpanel/dashboard', [AdminController::class,'dashboard'])->middleware(checkloginadmin::class);
// روش دوم نوشتن میدلور
// Route::match(['get','post'],'/adminpanel/dashboard', [AdminController::class,'dashboard'])->middleware('check.login.admin');

Route::get('/adminpanel/terms', [AdminController::class,'terms'])->middleware(checkloginadmin::class);
Route::get('/adminpanel/masters', [AdminController::class,'masters'])->middleware(checkloginadmin::class);
Route::get('/adminpanel/students', [AdminController::class,'students'])->middleware(checkloginadmin::class);
Route::get('/adminpanel/calender', [AdminController::class,'calender'])->middleware(checkloginadmin::class);
Route::get('/adminpanel/slider', [AdminController::class,'slider'])->middleware(checkloginadmin::class);
Route::get('/adminpanel/users', [AdminController::class,'users'])->middleware(checkloginadmin::class);

Route::post('/adminpanel/GetAllTerms', [AdminController::class,'GetAllTerms'])->middleware(checkloginadmin::class);
Route::post('/adminpanel/GetinfoTerms', [AdminController::class,'GetinfoTerms'])->middleware(checkloginadmin::class);
Route::post('/adminpanel/AddTerms', [AdminController::class,'AddTerms'])->middleware(checkloginadmin::class);
Route::post('/adminpanel/EditTerms', [AdminController::class,'EditTerms'])->middleware(checkloginadmin::class);
Route::post('/adminpanel/DeletTerms', [AdminController::class,'DeletTerms'])->middleware(checkloginadmin::class);

