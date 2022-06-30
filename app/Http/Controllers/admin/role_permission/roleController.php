<?php

namespace App\Http\Controllers\admin\role_permission;

use App\Http\Controllers\Controller;
use App\Models\admin\content;
use App\Models\admin\permission;
use App\Models\admin\role;
use App\Models\admin\role_permission;
use Illuminate\Http\Request;
use DB;

class roleController extends Controller
{
    public function Index()
    {
        // for permissions part here it is hence it is only visible by admin so downt need to provide permission
        $id  = auth()->user()->id;
        $add   = 1;
        $edit  = 1;
        $delete= 1;
        // permission ends
        $route='admin.user_roles.add_roles';
        $btn_name="Add Roles";
        $title="Roles";
        $subtitle="List Of All Roles";
        $list_item=role::with('permission')->get();
        $thead=['Sl','Role Id','Role Name','Permissions','Action'];
        $tbody=[];
        foreach($list_item as $key=>$list){
            $permission='';
            foreach($list->permission as $per){
                $per_name=permission::where('per_id',$per->per_id)->first();
                $permission.=$per_name->per_title.','.' ';
            }
              $value=[
                ++$key, $list->role_id, $list->role_title,$permission,$list->id,0,0 // hence checkbox & viewall is false so we pass this two zero
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.user_roles.edit';
        $deleteroute='admin.user_roles.delete';
        $viewable='false'; //check compact or not
        $checkbox='false'; //check compact or not
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','add','edit','delete'));

    }


    public function Add()
    {
        $id=role::max('id');
        $id++;
        if($id==null){
            $per_id='role-1';
        }else{
            $per_id='role-'.$id;
        }
        $permission=permission::get();
        // dd($permission);
        return view('admin.add-role',compact('permission','per_id'));
    }

    public function Save(Request $request)
    {
        $validated = $request->validate([
            'Role_code'      => 'required|max:20|unique:roles,role_id',
        ]);
        DB::beginTransaction();
        try{
            $data=[
                'role_id'     => $request->Role_code,
                'role_title'  => $request->Role_name,
            ];

            role::create($data);
            foreach($request->permission as $per_id){
                $data2=[
                    'role_id'=> $request->Role_code,
                    'per_id' => $per_id
                ];
                role_permission::create($data2);
            }
        }
        catch (\Exception $e){
            DB::rollback();
            return redirect()->route('admin.user_roles.show_roles')->with('error', 'Something Went Wrong');
        }
        DB::commit();
        return redirect()->route('admin.user_roles.show_roles')->with('status', 'successfully Added Role');

    }

    public function Delete(Request $request)
    {

        // dd("ok");
        $role_id=role::where('id',$request->id)->first();
        role::where('id',$request->id)->delete();
        role_permission::where('role_id',$role_id->role_id)->delete();
        return redirect()->back()->with('status', 'successfully Removed User');
    }

    public function Edit(Request $request)
    {
        $role=role::with('permission')->where('id',$request->id)->first();
        $permission=permission::get();
        return view('admin.edit.edit-role',compact('role','permission'));
        // dd('wait');
    }

    public function Update(Request $request)
    {
        DB::beginTransaction();
        try{
            role_permission::where('role_id',$request->Role_code)->update(['temp_flag'=>0]);
            foreach($request->permission as $per_id){
                $flag=role_permission::where(['role_id'=>$request->Role_code,'per_id'=>$per_id])->first();
                if($flag==null){
                    $data2=[
                        'role_id'=> $request->Role_code,
                        'per_id' => $per_id
                    ];
                    role_permission::create($data2);
                }else{
                    role_permission::where(['role_id'=>$request->Role_code,'per_id'=>$per_id])->update(['temp_flag'=>1]);
                }
            }
            role_permission::where('temp_flag',0)->delete();
        } catch (\Exception $e){
            DB::rollback();
            return redirect()->route('admin.user_roles.show_roles')->with('error', 'Something Went Wrong');
        }
        DB::commit();
        return redirect()->route('admin.user_roles.show_roles')->with('status', 'Role Successfully Updated ');

    }

    public function AboutUs(Request $request)
    {
        $content=content::first();
        return view('admin.about.about-us',compact('content'));
    }

    public function AboutUsSave(Request $request)
    {
        $content=content::where('id',1)->update(['about_us'=>$request->about]);
        return redirect()->back()->with('status','Successfully Updated About Us');
    }

    public function AboutDib(Request $request)
    {

        $content=content::first();
        return view('admin.about.about-dib',compact('content'));
    }

    public function AboutDibSave(Request $request)
    {
        $content=content::where('id',1)->update(['about_dibrugarh'=>$request->about]);
        return redirect()->back()->with('status','Successfully Updated About Us');
    }
}
