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

Route::get('/insert', function () {
    DB::insert("insert into Students(name,date_of_birth,GPA,advisor)values('Ayaulym','2002-04-18',4.0,'Zhangir')");
});

Route::get('/select', function () {
    $results=DB::select('select * from students where id=?',[1]);
    foreach($results as $students){
        echo "name is: ".$students->name;
        echo "<br>";
        echo "date of birth: ".$students->date_of_birth;
        echo "<br>";
        echo "GPA is: ".$students->GPA;
    }    
});

Route::get('/update', function () {
    $updated=DB::update('update students set name="Naruto" where id=?',[1]);
    return $updated;  
});

Route::get('/delete', function () {
    $deleted=DB::delete(' delete from students where id=?',[1]);
    return $deleted;  
});
