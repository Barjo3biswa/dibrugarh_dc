<?php

namespace App\Http\Controllers\admin\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Department;
use App\Models\admin\role;
use App\Models\admin\training;
use App\Models\applicant;
use App\Models\Attachment;
use App\Models\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage ;
use InvalidArgumentException;
use ZipArchive;
// use Storage;

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
        $validated = $request->validate([
            'department_id'      => 'required|max:20|unique:departments,department_id',
        ]);

        $data=[
            'department_name' => $request->department_name,
            'department_id'   => $request->department_id,
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
        $btn_name="Add User";
        $title="DEPERTMENT";
        $subtitle="List Of All Users";
        $list_item=User::where('user_role','!=','role-1')->get();
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
        $role       = role::get();
        return view('admin.add-dept-user',compact('department','role'));
    }

    public function RegisterSave(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([
            'department' => 'required|max:250',
            'name'       => 'required|max:250',
            'email'      => 'required|email|max:250|unique:users,email',
            'password'   => 'required|min:8|confirmed',
        ]);
        $data=[
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => bcrypt($request->password),
            'user_role'    => $request->role,
            'user_dept_id' => $request->department,
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

    public function ShowApplication(Request $request)
    {
        $trainingId=training::where('id',$request->id)->first();
        $applicants=applicant::where('training_id',$trainingId->training_id)->get();
        return view('admin.applicants.show-applicants',compact('applicants'));
    }

    public function downloadAtt(Request $request)
    {
        $regId=Crypt::decryptString($request->id);
        $files=Attachment::where('reg_no',$regId)->get();
        foreach($files as $file){
            // dd($file->att_location);
            Storage::download(public_path().$file->att_location);
                // return response()->file($file->att_location);
            // dump($file->att_location);  url('/')
            // return route($file->att_location);
            // return response()->file($file->att_location);

        }

        dd("ok");
    }

    public function ViewApplication(Request $request)
    {

        $id=Crypt::decryptString($request->id);

        $applications=applicant::with('department')->where('application_id',$id)->first();
        // dd($applications['department']['department_name']);
        $applications=$applications->toArray();
        // dd($applications->application_id);
        // $pdf = \PDF::loadView('both-end.download-show',array('applications' => $applications)); //load view page array('salesorder' => $salesorder,)
        // return $pdf->download($id.'.pdf'); // download pdf file
        return view('admin.applicants.show-indv-applicant',compact('applications'));
        // dd("ok");
    }


}
