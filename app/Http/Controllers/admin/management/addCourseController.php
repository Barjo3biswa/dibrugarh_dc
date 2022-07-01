<?php

namespace App\Http\Controllers\admin\management;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\course;
use Illuminate\Http\Request;

class addCourseController extends Controller
{

    public function index()
    {
        // for permissions part here it is
        $id  = auth()->user()->id;
        $add   =Helper::CheckPermission($id,'Add Course');
        $edit  =Helper::CheckPermission($id,'Edit Course');
        $delete=Helper::CheckPermission($id,'Delete Course');
        // permission ends
        $route='admin.add_course';
        $btn_name="Add Course";
        $title="COURSE";
        $subtitle="List Of All Course";
        $list_item=course::all();
        $thead=['Sl','Course Name','Course Code','Action'];
        $tbody=[];
        foreach($list_item as $key=>$list){
            $value=[
                0,++$key, $list->course_name, $list->course_id,$list->id,
            ];
            array_push($tbody,$value);
        }
        $editroute  ='admin.course.edit';
        $deleteroute='admin.course.delete';
        $viewable='false'; //check compact or not
        $checkbox='false'; //check compact or not
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','add','edit','delete'));
        // return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle'));
    }

    public function Add()
    {
        return view("admin.add-course");
    }

    public function Save(Request $request)
    {
        $id  = auth()->user()->id;
        $validated = $request->validate([
            'course_code'      => 'required|max:20|unique:courses,course_id',
        ]);
        $data=[
            'course_name' => $request->course_name,
            'course_id'   => $request->course_code,
            'created_by'  => $id
        ];
        // dd($data);
        course::create($data);
        return redirect()->route('admin.course')->with('status', 'successfully Added Course');
    }
    public function Delete(Request $request){
        course::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed Training');
    }

    public function Edit(Request $request)
    {
        $course=course::where('id',$request->id)->first();
        return view('admin.edit.edit-course',compact('course'));
    }

    public function Update(Request $request)
    {
        $data=[
            'course_name' => $request->course_name,
        ];
        // dd($data);
        course::where('course_id',$request->course_code)->update($data);
        return redirect()->route('admin.course')->with('status', 'Successfully Update Course');
    }
}
