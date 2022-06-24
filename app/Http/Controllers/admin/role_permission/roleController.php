<?php

namespace App\Http\Controllers\admin\role_permission;

use App\Http\Controllers\Controller;
use App\Models\admin\permission;
use App\Models\admin\role;
use App\Models\admin\role_permission;
use Illuminate\Http\Request;
use DB;

class roleController extends Controller
{
    public function Index()
    {
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
                ++$key, $list->role_id, $list->role_title,$permission,$list->id
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.user_roles.edit';
        $deleteroute='admin.user_roles.delete';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute'));

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
        // dd($role);
        $permission=permission::get();
        return view('admin.edit.edit-role',compact('role','permission'));
        // dd('wait');
    }

    public function Update(Request $request)
    {
        DB::beginTransaction();
        try{
            foreach($request->permission as $per_id){
                $flag=role_permission::where(['role_id'=>$request->Role_code,'per_id'=>$per_id])->first();
                if($flag==null){
                    $data2=[
                        'role_id'=> $request->Role_code,
                        'per_id' => $per_id
                    ];
                    role_permission::create($data2);
                }

            }
        } catch (\Exception $e){
            DB::rollback();
            return redirect()->route('admin.user_roles.show_roles')->with('error', 'Something Went Wrong');
        }
        DB::commit();
        return redirect()->route('admin.user_roles.show_roles')->with('status', 'Role Successfully Updated ');

    }
}
