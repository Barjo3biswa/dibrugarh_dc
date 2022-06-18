<?php

namespace App\Http\Controllers\admin\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Department;
use App\Models\User;

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
        $title="DEPERTMENT";
        $subtitle="List Of All Department";
        $list_item=Department::all();
        $thead=['Sl','Department Name','Department Code','Action'];
        $tbody=[];
        foreach($list_item as $key=>$list){
              $value=[
                ++$key, $list->department_name, $list->department_id,$list->id
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.department.edit';
        $deleteroute='admin.department.delete';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute'));
        // return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle'));
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

    public function Edit()
    {
        dd("wait");
    }

    public function RegisterForm()
    {
        $route='admin.department_user.add_dept_user';
        $btn_name="Add Department User";
        $title="DEPERTMENT";
        $subtitle="List Of All Department Users";
        $list_item=User::where('user_role','dept_user')->get();
        $thead=['Sl','User Name/ Email','Name','Action'];
        $tbody=[];
        foreach($list_item as $key=>$list){
              $value=[
                ++$key, $list->email, $list->name,$list->id
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.department_user.edit';
        $deleteroute='admin.department_user.delete';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute'));
    }

    public function ShowRegForm()
    {
        $department = Department::get();
        return view('admin.add-dept-user',compact('department'));
    }

    public function RegisterSave(Request $request)
    {

        $validated = $request->validate([
            'department' => 'required|max:250',
            'name'       => 'required|max:250',
            'email'      => 'required|email|max:250|unique:users,email',
            'password'   => 'required|min:8|confirmed',
        ]);
        $data=[
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'user_role' => 'dept_user',
        ];
        user::create($data);
        return redirect()->route('admin.department_user.users')->with('status', 'successfully Added Department User');
    }

    public function DepartmentUserEdit()
    {
        dd("oppsss");
    }

    public function DepartmentUserDelete(Request $request)
    {
        User::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed User');
    }
}
