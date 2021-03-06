<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Student;

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

Route::get('student/add', function () {
    DB::table('students')->insert([
        'name' => 'Ayaulym',
        'date_of_birth' => '2002-04-18',
        'GPA' => 4.0
    ]);
});

Route::get('student', function () {
    $student = Student::find(1);
    return $student;
});
