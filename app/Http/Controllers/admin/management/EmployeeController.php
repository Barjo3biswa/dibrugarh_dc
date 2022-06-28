<?php

namespace App\Http\Controllers\admin\management;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\job;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function Index()
    {
        // for permissions part here it is
        $id  = auth()->user()->id;
        $add   =Helper::CheckPermission($id,'Add Notification');
        $edit  =Helper::CheckPermission($id,'Edit Notification');
        $delete=Helper::CheckPermission($id,'Delete Notification');
        // permission ends
        $route='admin.employee.add_jobs';
        $btn_name="Add Jobs";
        $title="Employee Corner";
        $subtitle="List Of All Jobs";
        $list_item=job::all();
        $tbody=[];
        $thead=['Sl','Job Name','Status','Action'];
        foreach($list_item as $key=>$list){
            if($list->status==1){
                $status="Approved";
            }else if($list->status==3){
                $status="Rejected";
            }else{
                $status="Wait For Approvel";
            }
              $value=[
                ++$key, $list->job_title,$status,$list->id
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.employee.edit';
        $deleteroute='admin.employee.delete';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','add','edit','delete'));
        // return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle'));
    }

    public function Add()
    {
        // $type=Notificationtype::get();
        return view('admin.add-job');
    }

    public function Save(Request $request)
    {
        $role  = auth()->user()->user_role;
        if ($request->hasFile('attachment')) {
            $path="";
            $path = public_path() . '/images/attachment/job/';
            $file=$request->file('attachment');
            $imageName = $request->training_code.date('dmyhis') .'attachment.'.$file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path = url('/') . '/images/attachment/job/' . $imageName;
        }
        $id=job::max('id');
        if($id==null){
            $id=0;
        }
        $data=[
            'job_id'        => 'job-'.++$id,
            'company_name'  => $request->company_name,
            'job_title'     => $request->job_title,
            'description'   => $request->description,
            'no_of_post'    => $request->no_of_post,
            'location'      => $request->location,
            'eligibility'   => $request->qualification,
            'experience'    => $request->location,
            'attachments'   => $path ?? "",
            'date'          => date('Y-m-d'),
        ];

        job::create($data);
        return redirect()->route('admin.employee.view_jobs')->with('status', 'successfully Added Job... Wait For Administrator To Approve Your Request');
    }

    public function Delete(Request $request)
    {
        job::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed Job');
    }

    public function Edit(Request $request)
    {
        $jobs=job::where('id',$request->id)->first();
        return view('admin.edit.edit-job',compact('jobs'));
    }

    public function Update(Request $request)
    {
        $paths=job::where('id',$request->test)->first();
        $path=$paths->attachments;
        if ($request->hasFile('attachment')) {
            $path="";
            $path = public_path() . '/images/attachment/job/';
            $file=$request->file('attachment');
            $imageName = $request->training_code.date('dmyhis') .'attachment.'.$file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path = url('/') . '/images/attachment/job/' . $imageName;
        }
        $data=[
            'company_name'  => $request->company_name,
            'job_title'     => $request->job_title,
            'description'   => $request->description,
            'no_of_post'    => $request->no_of_post,
            'location'      => $request->location,
            'eligibility'   => $request->qualification,
            'experience'    => $request->location,
            'attachments'   => $path ?? "",
        ];

        job::where('id',$request->test)->update($data);
        return redirect()->route('admin.employee.view_jobs')->with('status', 'successfully Updated Job...');
    }
}
