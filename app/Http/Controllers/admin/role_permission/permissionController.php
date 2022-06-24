<?php

namespace App\Http\Controllers\admin\role_permission;

use App\Http\Controllers\Controller;
use App\Models\admin\permission;
use Illuminate\Http\Request;

class permissionController extends Controller
{
    public function Index()
    {
        $route='admin.user_permission.add_permission';
        $btn_name="Add Permission";
        $title="Permission";
        $subtitle="List Of All Permission";
        $list_item=permission::get();
        $thead=['Sl','Permission Id','Permission Name','Action'];
        $tbody=[];
        foreach($list_item as $key=>$list){
              $value=[
                ++$key, $list->per_id, $list->per_title,$list->id
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.user_permission.edit';
        $deleteroute='admin.user_permission.delete';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute'));

    }


    public function Add()
    {
        $id=permission::max('id');
        $id++;
        if($id==null){
            $per_id='per-1';
        }else{
            $per_id='per-'.$id;
        }
        // dd($per_id);
        return view('admin.add-permission',compact('per_id'));
    }

    public function Save(Request $request)
    {

        $validated = $request->validate([
            'Permission_code'      => 'required|max:20|unique:permissions,per_id',
        ]);
        $data=[
            'per_id'     => $request->Permission_code,
            'per_title'  => $request->Permission_name,
        ];

        permission::create($data);
        return redirect()->route('admin.user_permission.show_permission')->with('status', 'successfully Added Department User');
    }

    public function Delete(Request $request)
    {
        permission::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed User');
    }

    public function Edit(Request $request)
    {
        dd('wait');
    }
}
