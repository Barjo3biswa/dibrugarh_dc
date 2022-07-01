<?php

namespace App\Http\Controllers\admin\management;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\course;
use App\Models\admin\Department;
use App\Models\admin\scheme;
use App\Models\admin\training;
use App\Models\sector;
use Illuminate\Http\Request;

class TrainingController extends Controller
{



    public function index()
    {

        // for permissions part here it is
        $id  = auth()->user()->id;
        $add   =Helper::CheckPermission($id,'Add Training');
        $edit  =Helper::CheckPermission($id,'Edit Training');
        $delete=Helper::CheckPermission($id,'Delete Training');
        // permission ends

        // training Validation, Department can only see there own traning applications but admin can see all of them
        $role = auth()->user()->user_role;
        if($role=='role-1'){
            $list_item=training::all();
        }else{
            $list_item=training::where('department_code',auth()->user()->user_dept_id)->get();
        }
        // ends
        $route='admin.add_training';
        $btn_name="Add Training";

        $title="TRAINING";
        $subtitle="List Of All Training";
        $tbody=[];
        $thead=['Sl','Training Name','Training Code','Course Name','Scheme Name','Department Name','Start Date','End Date','Action'];//'activestatus' for checkbox,'id' for view dwtailsandEdit Delete
        foreach($list_item as $key=>$list){
            $value=[
                // ++$key, $list->training_name, $list->training_id,$list->course->course_name,$list->scheme->scheme_name,$list->department->department_name,$list->start_date,$list->end_date,$list->id,$list->active_status,0
                $list->active_status,++$key, $list->training_name, $list->training_id,$list->course->course_name,$list->scheme->scheme_name,$list->department->department_name,$list->start_date,$list->end_date,$list->id
            ];
            array_push($tbody,$value);
        }
        $editroute  ='admin.training.edit';
        $deleteroute='admin.training.delete';
        $viewable='true';
        $checkbox='true';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','viewable','add','edit','delete','checkbox'));
    }

    public function Add()
    {
        $training_id = training::max('id');
        if($training_id==null){
            $training_id=0;
        }
        $training_id = date('Ym').++$training_id;
        $scheme      = scheme::get();
        $department  = Department::get();
        $course      = course::get();
        $sector      = sector::get();
        return view("admin.add-training",compact('scheme','department','course','sector','training_id'));
    }
    public function Save(Request $request){
        // dd($request->all());
        if ($request->hasFile('training_attachments')) {
            $path7="";
            $path = public_path() . '/images/training_attachments/';
            $file=$request->file('training_attachments');
            $imageName = $request->training_code.date('dmyhis').'training_attachments.' . $file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path7 = url('/') . '/images/training_attachments/' . $imageName;
        }

        if ($request->hasFile('training_pdf')) {
            $path8="";
            $path = public_path() . '/images/training_pdf/';
            $file=$request->file('training_pdf');
            $imageName = $request->training_code.date('dmyhis') .'training_pdf.'.$file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path8 = url('/') . '/images/training_pdf/' . $imageName;
        }
        // dd($path7);

        $id  = auth()->user()->id;
        $validated = $request->validate([
            'training_code'      => 'required|max:20|unique:trainings,training_id',
        ]);
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
            'training_pdf'    => $path8,
            'registration_starts'  => $request->reg_start_date,
            'registration_ends'    => $request->reg_End_date,
            'active_status'   =>$request->publish_now,
            'sector_id'       =>$request->sector_code,
        ];
        // dd($data);
        training::create($data);
        return redirect()->route('admin.training')->with('status', 'successfully Added Training');
    }
    public function Delete(Request $request){
        training::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed Training');
    }

    public function Edit(Request $request)
    {
        $training_dtl=training::with('department','course','scheme')->where('id',$request->id)->first();
        // dd($training_dtl);
        $scheme      = scheme::get();
        $department  = Department::get();
        $course      = course::get();
        $sector      = sector::get();
        return view("admin.edit.edit-training",compact('training_dtl','scheme','department','course','sector'));
    }

    public function Activate(Request $request)
    {
        foreach($request->value as $val){
            training::where('id',$val)->update(['active_status'=>1]);
        }
        return response()->json(array('success' =>$request->value));

    }

    public function Update(Request $request)
    {
        // dd($request->all());
        $paths =training::where('training_id',$request->training_code)->first();
        $path7=$paths->attachments;
        $path8=$paths->training_pdf;
        if ($request->hasFile('training_attachments')) {
            $path7="";
            $path = public_path() . '/images/training_attachments/';
            $file=$request->file('training_attachments');
            $imageName = $request->training_code.date('dmyhis').'training_attachments.' . $file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path7 = url('/') . '/images/training_attachments/' . $imageName;
        }

        if ($request->hasFile('training_pdf')) {
            $path8="";
            $path = public_path() . '/images/training_pdf/';
            $file=$request->file('training_pdf');
            $imageName = $request->training_code.date('dmyhis') .'training_pdf.'.$file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path8 = url('/') . '/images/training_pdf/' . $imageName;
        }
        // dd($path7);
        $data=[
            'training_name'   => $request->training_name,
            'course_id'       => $request->course_code,
            'department_code' => $request->department_code,
            'scheme_id'       => $request->scheme_code,
            'start_date'      => $request->start_date,
            'end_date'        => $request->End_date,
            'training_details'=> $request->training_details,
            'place'           => $request->place,
            'contact_details' => $request->contact_details,
            'attachments'     => $path7,
            'training_pdf'    => $path8,
            'registration_starts'  => $request->reg_start_date,
            'registration_ends'    => $request->reg_End_date,
            'active_status'   => $request->publish_now,
            'sector_id'       => $request->sector_code,
        ];
        // dd($data);
        training::where('training_id',$request->training_code)->update($data);
        return redirect()->route('admin.training')->with('status', 'successfully Added Training');
    }
}
