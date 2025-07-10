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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SController;
use App\Http\Controllers\AController;
use App\Http\Controllers\BController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GController;
use App\Http\Controllers\HController;
use App\Http\Controllers\HomeController;

Auth::routes(); // これで login, register, logout などすべて自動定義

Route::get('/', function () {
    return view('welcome');
});

Route::get('/top', [SController::class, 'topView'])->name('S');
Route::get('/top1', [AController::class, 'topView'])->name('A');
Route::get('/top2', [BController::class, 'topView'])->name('store');
// top2 メニュー画面 B
Route::post('/top3', [StudentController::class, 'add']);
Route::get('/top3', [StudentController::class, 'topView'])->name('students.view');
// top3 学生表示画面 検索フォーム　C
Route::get('/top3', 'StudentController@topView')->name('views.students.show'); // Laravel 7 記法
Route::get('/top4', [StudentController::class, 'top4']);
Route::post('/students/store', [StudentController::class, 'store']);
// top4 学生登録画面 D
Route::get('/top5/{id}', [StudentController::class, 'top5'])->name('top5');
Route::post('/student/view', 'StudentController@view');
Route::get('/student/view', 'StudentController@topView');

// top5 学生詳細表示画面　E
Route::get('/grades/edit', [GradeController::class, 'edit']);     // 編集画面表示
Route::post('/grades/update', [GradeController::class, 'update']); // 登録処理
// top6 学生編集画面　F
Route::get('/top6/{id}', [StudentController::class, 'top6'])->name('student_update');
Route::post('/students/update', [StudentController::class, 'update'])->name('students.update');

Route::get('/top8/{id}', [GradeController::class, 'top8'])->name('grades_edit');
Route::post('/grades/edit', [GradeController::class, 'edit'])->name('grades.edit');
Route::get('/top7', [GController::class, 'topView'])->name('G');
Route::get('/top8', [HController::class, 'topView'])->name('grades_edit');
//top7　成績登録画面 G
Route::get('/top7/{id}', [GController::class, 'topView'])->name('grade.add');
Route::get('/inofrmation', [AController::class, 'A']);
Route::post('/grades/store', [GradeController::class, 'store'])->name('grades.store');
Route::post('/top3', [AController::class, 'add']);
//top8 成績編集画面　H
Route::get('/top8/{id}', [App\Http\Controllers\GradeController::class, 'top8']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//top ログイン関連　S.A
Route::get('/students', [StudentController::class, 'index']);

// 学年一括更新
Route::get('/students/create/{grade}', [StudentController::class, 'createWithGrade'])->name('students.createWithGrade');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
Route::post('/students/update-grade', [StudentController::class, 'updateGrade']);

Route::get('/students/search', [App\Http\Controllers\StudentController::class, 'ajaxSearch'])->name('student.ajaxSearch');

Route::post('/students/update-grade', [StudentController::class, 'updateGrade'])->name('students.updateGrade');
Route::get('/student/ajax-detail', [StudentController::class, 'ajaxSearchDetail'])->name('student.ajaxSearchDetail');

Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');