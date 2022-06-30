<?php

namespace App\Http\Controllers\admin\management;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\Notification;
use App\Models\admin\Notificationtype;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function Index()
    {
        // for permissions part here it is
        $id  = auth()->user()->id;
        $add   =Helper::CheckPermission($id,'Add Notification');
        $edit  =Helper::CheckPermission($id,'Edit Notification');
        $delete=Helper::CheckPermission($id,'Delete Notification');
        // permission ends
        $route='admin.notification.add_notifi';
        $btn_name="Add Notification";
        $title="Notification";
        $subtitle="List Of All Notification";
        $list_item=Notification::with('noticationtype')->get();
        $tbody=[];
        $thead=['Sl','Notification Name','type','New','Status','Action'];
        foreach($list_item as $key=>$list){
            if($list->new_status==1){
                $new ="Yes";
            }else{
                $new ="No";
            }

            if($list->status==1){
                $status ="Active";
            }else{
                $status ="No Active";
            }
              $value=[
                ++$key, $list->title, $list->noticationtype->type,$new,$status,$list->id,$list->status,$list->id
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.notification.edit';
        $deleteroute='admin.notification.delete';
        $checkbox='trueii';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','add','edit','delete','checkbox'));
    }

    public function Add()
    {
        $type=Notificationtype::get();
        return view('admin.add-notification',compact('type'));
    }

    public function Save(Request $request)
    {

        // $validated = $request->validate([
        //     'Permission_code'      => 'required|max:20|unique:permissions,per_id',
        // ]);
        $role  = auth()->user()->user_role;
        $id    = auth()->user()->id;
        if ($request->hasFile('attachments')) {
            $path="";
            $path = public_path() . '/images/attachments/';
            $file=$request->file('attachments');
            $imageName = $request->training_code.date('dmyhis') .'attachments.'.$file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path = url('/') . '/images/attachments/' . $imageName;
        }
        $data=[
            'title'        => $request->notifi_title,
            'description'  => $request->descrip,
            'notice_date'  => $request->date,
            'type'         => $request->notifi_type,
            'new_status'   => $request->new,
            'status'       => $request->publish_now,
            'is_departmtnt'=> $role,
            'created_by'   => $id,
            'attachments'  => $path ?? ""
        ];

        Notification::create($data);
        return redirect()->route('admin.notification.view_notifications')->with('status', 'successfully Added Department User');
    }

    public function Delete(Request $request)
    {
        Notification::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed User');
    }

    public function Edit(Request $request)
    {
        // dd($request->all());
        $type=Notificationtype::get();
        $notifi_dtl=Notification::where('id',$request->id)->first();
        // dd($notifi_dtl);
        return view('admin.edit.edit-notification',compact('notifi_dtl','type'));
    }

    public function ActivateNotifi(Request $request)
    {
        foreach($request->value as $val){
            Notification::where('id',$val)->update(['status'=>1]);
        }
        return response()->json(array('success' =>$request->value));
    }

    public function Update(Request $request)
    {
        // dd($request->all());
        $forpath=Notification::where('id',$request->test)->first();
        // dd()
        $path=$forpath->attachments;
        if ($request->hasFile('attachments')) {
            $path="";
            $path = public_path() . '/images/attachments/';
            $file=$request->file('attachments');
            $imageName = $request->training_code.date('dmyhis') .'attachments.'.$file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path = url('/') . '/images/attachments/' . $imageName;
        }
        $data=[
            'title'        => $request->notifi_title,
            'description'  => $request->descrip,
            'notice_date'  => $request->date,
            'type'         => $request->notifi_type,
            'new_status'   => $request->new,
            'status'       => $request->publish_now,
            // 'is_departmtnt'=> $role,
            // 'created_by'   => $id,
            'attachments'  => $path ?? ""
        ];

        Notification::where('id',$request->test)->update($data);
        return redirect()->route('admin.notification.view_notifications')->with('status', 'successfully Updated Notification');
    }
}
