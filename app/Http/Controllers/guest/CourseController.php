<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\admin\training;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        // dd("ok");
        $trainings= training::with('department','course','scheme')->get();
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
}
