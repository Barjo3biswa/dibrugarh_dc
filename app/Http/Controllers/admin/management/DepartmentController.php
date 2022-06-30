<?php

namespace App\Http\Controllers\admin\management;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\Cast;
use Illuminate\Http\Request;
use App\Models\admin\Department;
use App\Models\admin\Qualification;
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
        // for permissions part here it is
        $id  = auth()->user()->id;
        $add   =Helper::CheckPermission($id,'Add Department');
        $edit  =Helper::CheckPermission($id,'Edit Department');
        $delete=Helper::CheckPermission($id,'Delete Department');
        // permission ends
        $route='admin.add_department';
        $btn_name="Add Department";
        $title="DEPERTMENT";
        $subtitle="List Of All Department";
        $list_item=Department::all();
        $thead=['Sl','Department Name','Department Code','Action'];
        $tbody=[];
        foreach($list_item as $key=>$list){
              $value=[
                ++$key, $list->department_name, $list->department_id,$list->id,0,0 // hence checkbox & viewall is false so we pass this two zero
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.department.edit';
        $deleteroute='admin.department.delete';
        $viewable='false'; //check compact or not
        $checkbox='false'; //check compact or not
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','add','edit','delete'));
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

    public function Edit(Request $request)
    {
        $department=Department::where('id',$request->id)->first();
        return view('admin.edit.edit-department',compact('department'));
    }

    public function update(Request $request)
    {
        $data=[
            'department_name' => $request->department_name,

        ];
        Department::where('department_id',$request->department_id)->update($data);
        return redirect()->route('admin.department')->with('status', 'successfully Updated Department');
    }

    public function RegisterForm()
    {
        // for permissions part here it is hence it is only visible by admin so downt need to provide permission
        $id  = auth()->user()->id;
        $add   = 1;
        $edit  = 1;
        $delete= 1;
        // permission ends
        $route='admin.department_user.add_dept_user';
        $btn_name="Add User";
        $title="DEPERTMENT";
        $subtitle="List Of All Users";
        $list_item=User::where('user_role','!=','role-1')->get();
        $thead=['Sl','User Name/ Email','Name','Action'];
        $tbody=[];
        foreach($list_item as $key=>$list){
              $value=[
                ++$key, $list->email, $list->name,$list->id,0,0 // hence checkbox & viewall is false so we pass this two zero
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.department_user.edit';
        $deleteroute='admin.department_user.delete';
        $viewable='false'; //check compact or not
        $checkbox='false'; //check compact or not
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','add','edit','delete'));
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

    public function DepartmentUserEdit(Request $request)
    {
        // dd($request->all());
        $department = Department::get();
        $role       = role::get();
        $user_detail = user::where('id',$request->id)->first();
        // dd($user_detail);
        return view('admin.edit.edit-dept-user',compact('department','role','user_detail'));
    }

    public function DepartmentUserUpdate(Request $request)
    {

        $check=user::where('id',$request->test)->first();
        if($check->email != $request->email){
            $validated = $request->validate([
                'email'      => 'required|email|max:250|unique:users,email',
            ]);
        }

        if($request->password!=null){
            $validated2 = $request->validate([
                'password'   => 'required|min:8|confirmed',
            ]);
        }

        $data=[
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => bcrypt($request->password)?? $check->password,
            'user_role'    => $request->role,
            'user_dept_id' => $request->department,
        ];
        user::where('id',$request->test)->update($data);
        return redirect()->route('admin.department_user.users')->with('status', 'successfully Updated Department User');
    }

    public function DepartmentUserDelete(Request $request)
    {
        User::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed User');
    }

    public function ShowApplication(Request $request)
    {

        $id=$request->id;
        // dd($request->all());
        $qualification=Qualification::all();
        $cast=Cast::all();
        $trainingId=training::where('id',$id)->first();
        $applicants=applicant::with('department','qualification','cast')->where('training_id',$trainingId->training_id)
                                ->when($request->reg_No,function($query) use($request){
                                    return $query->where('applicants.application_id',$request->reg_No);
                                    })
                                ->when($request->Qualification,function($query) use($request){
                                    return $query->where('applicants.app_qualification',$request->Qualification);
                                    })
                                ->when($request->cast,function($query) use($request){
                                    return $query->where('applicants.category',$request->cast);
                                    })
                                ->when($request->gender,function($query) use($request){
                                    return $query->where('applicants.app_gender',$request->gender);
                                    })
                               ->get();

        $filter=$request->all();
        if($request->has('export')){

            return $this->exportExcel($applicants);
        }
        return view('admin.applicants.show-applicants',compact('applicants','id','qualification','cast','filter'));
    }

    private function exportExcel($excel){
        $fileName = 'tasks.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('SL','Applicant Name','Application No','Training Name','Department','Qualification','Caste','Gnder','Father Name','Mother Name','Presenr Address','Permanent Address');
        // dd($excel);
        $callback = function() use($excel, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            $count=0;
            foreach ($excel as $task) {
                $count=$count+1;
                $row['SL']      = $count;
                $row['name']      = $task->app_name;
                $row['appNo']      = $task->application_id;
                $row['training_name']      = $task->training_name;
                $row['department_name']      = $task->department->department_name;
                $row['qualification']      = $task->qualification->title;
                $row['caste']      = $task->cast->cast_name;
                $row['gender']      = $task->app_gender;
                $row['father_name']      = $task->app_father_name;
                $row['mother_name']      = $task->app_mother_name;
                $row['pre_add']      ='Village/town:'. $task->p_vill  .','.'District:' .$task->p_district  .','.'State:' .$task->p_state  .','.'ZIP:' .$task->p_zip  .','.'PO:' .$task->p_po  .','.'PS:' .$task->p_ps;
                $row['par_add']      ='Village/town:'.  $task->per_vill.','.'District:' .$task->per_district.','.'State:' .$task->per_state.','.'ZIP:' .$task->per_zip.','.'PO:' .$task->per_po.','.'PS:' .$task->per_ps;
                fputcsv($file, array($row['SL'],$row['name'],$row['appNo'],$row['training_name'],$row['department_name'],$row['qualification'],$row['caste'],$row['gender'],$row['father_name'],$row['mother_name'], $row['pre_add'], $row['par_add']));
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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
