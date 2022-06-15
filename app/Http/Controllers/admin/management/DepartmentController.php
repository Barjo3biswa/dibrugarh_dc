<?php

namespace App\Http\Controllers\admin\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Department;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $route='admin.add_department';
        $btn_name="Add Department";
        $thead=['Sl','Department Name','Department Code','Action'];
        $title="DEPERTMENT";
        $subtitle="List Of All Department";
        $list_item=Department::all();
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle'));
    }

    public function Add()
    {
        return view("admin.add-department");
    }

    public function Save(Request $request){
        $id  = auth()->user()->id;

        $data=[
            'department_name' => $request->department_name,
            'department_id'   => $request->department_code,
            'created_by'      => $id
        ];
        // dd($data);
        Department::create($data);
        return redirect()->route('admin.department')->with('status', 'successfully Added Department');
    }
    public function Delete(Request $request){
        Department::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed Training');
    }
}
