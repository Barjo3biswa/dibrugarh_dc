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






// Route::get('/', function () {
//     return view('dibrugarh.index');
// });

// Route::get('/', function () {
//     return view('dibrugarh.index');
// });

Route::get('/', 'guest\CourseController@showHomepage');
Route::get('index', 'guest\CourseController@showHomepage')->name('index');

// Route::get('index', function () {
//     return view('dibrugarh.index');
// })->name('index');

Route::get('about_dibrugarh', function () {
    return view('dibrugarh.about-dibrugarh');
})->name('about_dibrugarh');

Route::get('about_us', function () {
    return view('dibrugarh.about');
})->name('about_us');
Route::get('/course_dtl', 'guest\CourseController@index')->name('course_dtl');
Route::post('/view_course_details', 'guest\CourseController@ViewCourseDetails')->name('view_course_details');
Route::get('/apply_reqistration', 'guest\CourseController@ApplyOrReqister')->name('apply_reqistration');
Route::post('/training_register', 'guest\CourseController@Reqister')->name('training_register');












Route::get('login/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin',"as"  => "admin."], function () {
        //Route::get('add_course',['as'    =>  'add_course','uses' => 'addCourseController@index']);
        Route::get('/sector', 'admin\management\SectorController@index')->name('sector');
        Route::get('/course', 'admin\management\addCourseController@index')->name('course');
        Route::get('/department', 'admin\management\DepartmentController@index')->name('department');
        Route::get('/training', 'admin\management\TrainingController@index')->name('training');
        Route::get('/scheme', 'admin\management\SchemeController@index')->name('scheme');

        Route::get('/add_sector', 'admin\management\SectorController@Add')->name('add_sector');
        Route::get('/add_course', 'admin\management\addCourseController@Add')->name('add_course');
        Route::get('/add_department', 'admin\management\DepartmentController@Add')->name('add_department');
        Route::get('/add_training', 'admin\management\TrainingController@Add')->name('add_training');
        Route::get('/add_scheme', 'admin\management\SchemeController@Add')->name('add_scheme');

        Route::group(['prefix' => 'sector',"as"  => "sector."], function () {
            Route::post('/save', 'admin\management\SectorController@Save')->name('save');
            Route::post('/delete', 'admin\management\SectorController@Delete')->name('delete');
            Route::post('/edit', 'admin\management\SectorController@Edit')->name('edit');
        });

        Route::group(['prefix' => 'department',"as"  => "department."], function () {
            Route::post('/save', 'admin\management\DepartmentController@Save')->name('save');
            Route::post('/delete', 'admin\management\DepartmentController@Delete')->name('delete');
            Route::post('/edit', 'admin\management\DepartmentController@Edit')->name('edit');
        });

        Route::group(['prefix' => 'course',"as"  => "course."], function () {
            Route::post('/save', 'admin\management\addCourseController@Save')->name('save');
            Route::post('/delete', 'admin\management\addCourseController@Delete')->name('delete');
            Route::post('/edit', 'admin\management\addCourseController@Edit')->name('edit');
        });

        Route::group(['prefix' => 'training',"as"  => "training."], function () {
            Route::post('/save', 'admin\management\TrainingController@Save')->name('save');
            Route::post('/delete', 'admin\management\TrainingController@Delete')->name('delete');
            Route::post('/edit', 'admin\management\TrainingController@Edit')->name('edit');
        });

        Route::group(['prefix' => 'scheme',"as"  => "scheme."], function () {
            Route::post('/save', 'admin\management\SchemeController@Save')->name('save');
            Route::post('/delete', 'admin\management\SchemeController@Delete')->name('delete');
            Route::post('/edit', 'admin\management\SchemeController@Edit')->name('edit');
        });

    });
});


