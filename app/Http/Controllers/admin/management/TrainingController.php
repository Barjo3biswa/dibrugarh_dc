<?php

namespace App\Http\Controllers\admin\management;

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
        $role = auth()->user()->user_role;
        if($role=='role-1'){
            $list_item=training::all();
        }else{
            $list_item=training::where('department_code',auth()->user()->user_dept_id)->get();
        }
        $route='admin.add_training';
        $btn_name="Add Training";

        $title="TRAINING";
        $subtitle="List Of All Training";
        $tbody=[];
        $thead=['Sl','Training Name','Training Code','Course Name','Scheme Name','Department Name','Start Date','End Date','Action'];
        foreach($list_item as $key=>$list){
              $value=[
                ++$key, $list->training_name, $list->training_id,$list->course->course_name,$list->scheme->scheme_name,$list->department->department_name,$list->start_date,$list->end_date,$list->id
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.department.edit';
        $deleteroute='admin.department.delete';
        $viewable='true';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','viewable'));
        // dd($list_item);
        // return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle'));
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

    public function Edit()
    {
        dd("wait");
    }
}
