<?php

namespace App\Http\Controllers\admin\management;

use App\Http\Controllers\Controller;
use App\Models\admin\course;
use App\Models\admin\Department;
use App\Models\admin\scheme;
use App\Models\admin\training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{



    public function index()
    {
        // return view("admin\add-course");
        $route='admin.add_training';
        $btn_name="Add Training";
        $thead=['Sl','Training Name','Training Code','Course Name','Scheme Name','Department Name','Start Date','End Date','Action'];
        $list_item=training::all();
        $title="TRAINING";
        $subtitle="List Of All Training";
        // dd($list_item);
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle'));
    }

    public function Add()
    {
        $scheme      = scheme::get();
        $department  = Department::get();
        $course      = course::get();
        return view("admin.add-training",compact('scheme','department','course'));
    }
    public function Save(Request $request){
        // dd($request->all());
        // if ($request->hasFile('training_attachments')) {

            $path7="";
            $path = public_path() . '/images/training_attachments/';
            $file=$request->file('training_attachments');
            $imageName = date('dmyhis') . 'training_attachments.' . $file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path7 = url('/') . '/images/training_attachments/' . $imageName;
        // }
        // dd($path7);

        $id  = auth()->user()->id;
        $data=[
            'training_name'   => $request->training_name,
            'training_id'     => $request->training_code,
            'course_id'       => $request->course_code,
            'department_code' => $request->department_code,
            'scheme_id'       => $request->scheme_code,
            'start_date'      => $request->start_date,
            'end_date'        => $request->End_date,
            'training_details'=> $request->training_details,
            'created_by'      => $id,
            'place'           => $request->place,
            'contact_details' => $request->contact_details,
            'attachments'     => $path7,
            'registration_starts'  => $request->reg_start_date,
            'registration_ends'    => $request->reg_End_date,
            'active_status'   =>$request->publish_now
        ];
        // dd($data);
        training::create($data);
        return redirect()->route('admin.training')->with('status', 'successfully Added Training');
    }
    public function Delete(Request $request){
        training::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed Training');
    }

    public function Edit()
    {
        dd("wait");
    }
}
