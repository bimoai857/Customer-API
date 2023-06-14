<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/setup',function(){
  $credentials=[
    'email'=>'admin@gmail.com',
    'password'=>'1234'
  ];
  if(!Auth::attempt($credentials)){
  $user=new \App\Models\User();
  $user->name='Admin';
  $user->email=$credentials['email'];
  $user->password=\Hash::make($credentials['password']);
  $user->save();

  $adminToken=$user->createToken('admin-token',['create','update']);
  if(Auth::attempt($credentials)){
    $user=Auth::user();
    $adminToken=$user->createToken('admin-token',['create','update','delete']);
  }
  }
    return ['admin-token'=>$adminToken];
});
//3|EzeFzboGuvQAo1tSKyvgDaM1bcIJeO2mQIPoyLnD
