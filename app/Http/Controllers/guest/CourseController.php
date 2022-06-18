<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\admin\course;
use App\Models\admin\training;
use App\Models\sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(){
        // dd("ok");
        $trainings= training::with('department','course','scheme')->where('active_status',1)->orderby('start_date','desc')->get();
        // dd($trainings);
        return view('dibrugarh.course-details',compact('trainings'));
    }

    public function ViewCourseDetails(Request $request){
        $data=Crypt::decryptString($request->id);
        // dd($data);
        $coursedtl=training::with('department','course','scheme')->where('id',$data)->first();
        return view('dibrugarh.course-event',compact('coursedtl'));
    }

    public function ApplyOrReqister(Request $request){
        $data=Crypt::decryptString($request->id);
        $coursedtl=training::where('id',$data)->first();
        return view('dibrugarh.course-registration',compact('coursedtl'));
    }

    public function ApplyOrLogin(Request $request){
        return view('dibrugarh.course-login');
    }

    public function Reqister(Request $request){
        // dd("ok");
        dd($request->all());
    }

    public function showHomepage()
    {
        // dd("ok");
        $sector=sector::all();
        $course=course::all();

        $today=date('Y-m-d');
        // dd($today);
        $upcomingevents=training::where(DB::raw("str_to_date(start_date, '%Y-%m-%d')"), '>', $today)->get();
        // dd($upcomingevents);
        return view('dibrugarh.index',compact('sector','course','upcomingevents'));
    }

    public function SearchCourses(Request $request)
    {
        // dd($request->all());
        $trainings= training::with('department','course','scheme')->where('active_status',1)
                            ->when($request->sector,function($query) use($request){
                                return $query->where('trainings.sector_id',$request->sector);
                                })
                            ->when($request->courses,function($query) use($request){
                                return $query->where('trainings.course_id',$request->courses);
                                })
                            ->orderby('start_date','desc')->get();
        return view('dibrugarh.course-details',compact('trainings'));
    }
}
