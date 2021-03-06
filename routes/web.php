<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Student;
use App\Post;

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

Route::get('/add', function () {
    DB::insert("insert into Students(name,date_of_birth,GPA,advisor)values('Ayaulym5','2002-04-18',4.0,'Zhangir')");
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

/*Route::get('/read', function () {
    $students=Student::all();
    foreach($students as $student){
        echo $student->name;
        echo "<br>";
    } 
});*/

/*Route::get('/find', function () {
    $students=Student::find(2);
    return $students->name;
});*/

/*Route::get('/find', function () {
    $students=Student::where('id',2)->first();
    return $students;
});*/

Route::get('/select2', function () {
    $students=Student::where('id',1)->value('name');
    return $students;
});

Route::get('/add2', function () {
    $student=new Student;
    $student->name='Midoria';
    $student->date_of_birth='2001-03-14';
    $student->GPA=3.9;
    $student->advisor='Aizawa';
    $student->save();
});

Route::get('/update2', function () {
    $student=Student::find(2);
    $student->name='Todoroki';
    $student->date_of_birth='2001-07-09';
    $student->GPA=4.0;
    $student->advisor='Aizawa';
    $student->save();
});

Route::get('/delete2',function(){
    $student=Student::find(1);
    $student->delete();
});