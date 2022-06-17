<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\admin\course;
use App\Models\admin\training;
use App\Models\sector;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        // dd("ok");
        $trainings= training::with('department','course','scheme')->where('active_status',1)->get();
        // dd($trainings);
        return view('dibrugarh.course-details',compact('trainings'));
    }

    public function ViewCourseDetails(Request $request){
        $coursedtl=training::with('department','course','scheme')->where('id',$request->id)->first();
        return view('dibrugarh.course-event',compact('coursedtl'));
    }

    public function ApplyOrReqister(Request $request){
        $coursedtl=training::where('id',$request->id)->first();
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
        return view('dibrugarh.index',compact('sector','course'));
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
                            ->get();
        return view('dibrugarh.course-details',compact('trainings'));
    }
}
