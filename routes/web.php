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






// Guest
Route::get('/', 'guest\CourseController@showHomepage');
Route::get('index', 'guest\CourseController@showHomepage')->name('index');

Route::get('about_dibrugarh', function () {
    return view('dibrugarh.about-dibrugarh');
})->name('about_dibrugarh');

Route::get('about_us', function () {
    return view('dibrugarh.about');
})->name('about_us');

Route::get('screenreader', function () {
    return view('dibrugarh.screen-reader-access');
})->name('screenreader');

Route::get('notice_board', 'guest\CourseController@NoticeBoard')->name('notice_board');

Route::get('/course_dtl', 'guest\CourseController@index')->name('course_dtl');
Route::post('/view_course_details', 'guest\CourseController@ViewCourseDetails')->name('view_course_details');
Route::get('/apply_reqistration', 'guest\CourseController@ApplyOrReqister')->name('apply_reqistration');
Route::post('/training_register', 'guest\CourseController@Reqister')->name('training_register');
Route::post('/search_courses', 'guest\CourseController@SearchCourses')->name('search_courses');




// Department
Route::get('department_login/', function () {
    return view('dibrugarh.department-login');
})->name('department_login');










// Admin
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

        Route::group(['prefix' => 'department_user',"as"  => "department_user."], function () {
            Route::get('/users', 'admin\management\DepartmentController@RegisterForm')->name('users');
            Route::get('/add_dept_user', 'admin\management\DepartmentController@ShowRegForm')->name('add_dept_user');
            Route::post('/save', 'admin\management\DepartmentController@RegisterSave')->name('save');
            Route::post('/delete', 'admin\management\DepartmentController@DepartmentUserDelete')->name('delete');
            Route::post('/edit', 'admin\management\DepartmentController@DepartmentUserEdit')->name('edit');
        });

        Route::group(['prefix' => 'user_roles',"as"  => "user_roles."], function () {
            Route::get('/show_roles', 'admin\role_permission\roleController@Index')->name('show_roles');
            Route::get('/add_roles', 'admin\role_permission\roleController@Add')->name('add_roles');
            Route::post('/save', 'admin\role_permission\roleController@Save')->name('save');
            Route::post('/delete', 'admin\role_permission\roleController@Delete')->name('delete');
            Route::post('/edit', 'admin\role_permission\roleController@Edit')->name('edit');
            Route::post('/update', 'admin\role_permission\roleController@Update')->name('update');
        });

        Route::group(['prefix' => 'user_permission',"as"  => "user_permission."], function () {
            Route::get('/show_permission', 'admin\role_permission\permissionController@Index')->name('show_permission');
            Route::get('/add_permission', 'admin\role_permission\permissionController@Add')->name('add_permission');
            Route::post('/save', 'admin\role_permission\permissionController@Save')->name('save');
            Route::post('/delete', 'admin\role_permission\permissionController@Delete')->name('delete');
            Route::post('/edit', 'admin\role_permission\permissionController@Edit')->name('edit');
        });

        Route::group(['prefix' => 'department_user',"as"  => "department_user."], function () {
            Route::post('/view_applications', 'admin\management\DepartmentController@ShowApplication')->name('view_applications');
            Route::post('/download_attachments', 'admin\management\DepartmentController@downloadAtt')->name('download_attachments');
            Route::post('/view_application', 'admin\management\DepartmentController@ViewApplication')->name('view_application');
        });

        Route::group(['prefix' => 'notification',"as"  => "notification."], function () {
            Route::get('/view_notifications', 'admin\management\NotificationController@Index')->name('view_notifications');
            Route::get('/add_notification', 'admin\management\NotificationController@Add')->name('add_notifi');
            Route::post('/save', 'admin\management\NotificationController@Save')->name('save');
            Route::post('/delete', 'admin\management\NotificationController@Delete')->name('delete');
            Route::post('/edit', 'admin\management\NotificationController@Edit')->name('edit');
        });

    });
});


