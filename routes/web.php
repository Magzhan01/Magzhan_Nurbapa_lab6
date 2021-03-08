<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/insert', function () {
    DB::insert('insert into Students(Name, Date_of_Birth, GPA, Advisor) values(?,?,?,?)',
    ['Samat', '2001-02-03', 3.5 , 'Ualikhan'] );
});
Route::get('/select', function () {
   $result=DB::select('select * from Students');
   foreach($result as $student){
       echo "Name is: ".$student->Name;
       echo "<br>";
       echo "Date_of_Birth is: ".$student->Date_of_Birth;
       echo "<br>";
       echo "GPA is: ".$student->GPA;
       echo "<br>";
       echo "Advisor is: ".$student->advisor;
       echo "<br>";
       echo "<br>";

   }
});

Route::get('/update', function () {
    $update=DB::update('update Students set Name="Arman",
    Date_of_Birth="2002-08-07",GPA=2.9, Advisor="Alikhan" where id=2');
});
Route::get('/delete', function () {
    $deleted=DB::delete('delete from Students where id=2');
});





Route::get('/selectwithModel', function () {
    $result=Student::all();
    foreach($result as $student){
        echo "Name is: ".$student->Name;
        echo "<br>";
        echo "Date_of_Birth is: ".$student->Date_of_Birth;
        echo "<br>";
        echo "GPA is: ".$student->GPA;
        echo "<br>";
        echo "Advisor is: ".$student->advisor;
        echo "<br>";
        echo "<br>";
 
    }
 });
 Route::get('/insertwithModel', function () {
    $student=new Student;
    $student->Name='Adilet';
    $student->Date_of_Birth='2002-03-01';
    $student->GPA=3.6;
    $student->advisor='Askhan';
    $student->save();
});
Route::get('/updatewithModel', function () {
    $student=Student::find(4);
    $student->Name='Atlan';
    $student->Date_of_Birth='2000-03-04';
    $student->GPA=2.6;
    $student->advisor='Askhan';
    $student->save();
});
Route::get('/deletewithModel', function () {
    $student=Student::find(4);
    $student->delete();
});



