<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/admin', 'HomeController@index')->name('admin')->middleware('verified');

Route::resources([
    'doctors' => 'Pages\DoctorsController',
    'patients' => 'Pages\PatientController',
    'appointments' => 'Pages\AppointmentsController',
    'schedule' => 'Pages\ScheduleController',
    'departments' => 'Pages\DepartmentsController',
    'account-profile' => 'Pages\UserAccountController'
]);