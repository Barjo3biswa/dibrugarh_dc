<?php

namespace App\Http\Controllers\admin\management;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\UpcomingEntrepreneurEvent;
use App\Models\admin\UpcomingEntrepreneurStory;
use Illuminate\Http\Request;

class EntrepreneurController extends Controller
{
    public function EventView()
    {
        $id  = auth()->user()->id;
        $add   =Helper::CheckPermission($id,'Add Notification');
        $edit  =Helper::CheckPermission($id,'Edit Notification');
        $delete=Helper::CheckPermission($id,'Delete Notification');
        // permission ends
        $route='admin.entrepreneur.add_event';
        $btn_name="Add Event";
        $title="Entrepreneur Corner";
        $subtitle="List Of All Events";
        $list_item=UpcomingEntrepreneurEvent::all();
        $tbody=[];
        $thead=['Sl','Event Name','Status','Action'];
        foreach($list_item as $key=>$list){
            if($list->status==1){
                $status="Active";
            }else{
                $status="Not Active";
            }
            $value=[
                $list->status,++$key, $list->event_name,$status,$list->id,
            ];
            array_push($tbody,$value);
        }
        $editroute  ='admin.entrepreneur.event.edit';
        $deleteroute='admin.entrepreneur.event.delete';
        $viewable='false'; //check compact or not
        $checkbox='trueiv';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','add','edit','delete','checkbox'));
    }

    public function AddEvent(Request $request)
    {
        return view('admin.add-entrepreneur-event');
    }

    public function EventSave(Request $request)
    {
        $event_id=UpcomingEntrepreneurEvent::max('id');
        if($event_id==null){
            $event_id='evnt-1';
        }else{
            $event_id='evnt-'.++$event_id;
        }

        if ($request->hasFile('attachments')) {
            $path="";
            $path = public_path() . '/images/attachments/';
            $file=$request->file('attachments');
            $imageName = $event_id.date('dmyhis') .'attachments.'.$file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path = url('/') . '/images/attachments/' . $imageName;
        }

        $data=[
            'event_id'   => $event_id,
            'event_name' => $request->event_title,
            'event_date' => $request->date,
            'description'=> $request->descrip,
            'attachment' => $path ?? "",
            'status'     => $request->publish_now,
        ];

        UpcomingEntrepreneurEvent::create($data);
        return redirect()->route('admin.entrepreneur.event')->with('status', 'successfully Added Entrepreneurs Event');
    }

    public function EditEvent(Request $request)
    {
        // dd($request->all());
        $event_dtl=UpcomingEntrepreneurEvent::where('id',$request->id)->first();
        return view('admin.edit.edit-entrepreneur-event',compact('event_dtl'));
    }

    public function DeleteEvent(Request $request)
    {
        UpcomingEntrepreneurEvent::where('id',$request->id)->delete();
        return redirect()->route('admin.entrepreneur.event')->with('status', 'successfully Deleted Entrepreneurs Event');
    }

    public function StoryView()
    {
        $id  = auth()->user()->id;
        $add   =Helper::CheckPermission($id,'Add Notification');
        $edit  =Helper::CheckPermission($id,'Edit Notification');
        $delete=Helper::CheckPermission($id,'Delete Notification');
        // permission ends
        $route='admin.entrepreneur.add_story';
        $btn_name="Add Story";
        $title="Entrepreneur Corner";
        $subtitle="List Of All Story";
        $list_item=UpcomingEntrepreneurStory::all();
        $tbody=[];
        $thead=['Sl','Story Name','Action'];
        foreach($list_item as $key=>$list){
            if($list->status==1){
                $status="Active";
            }else{
                $status="Not Active";
            }
            $value=[
                0,++$key, $list->name,$list->id,
            ];
            array_push($tbody,$value);
        }
        $editroute  ='admin.entrepreneur.story.edit';
        $deleteroute='admin.entrepreneur.story.delete';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','add','edit','delete'));
    }

    public function AddStory(Request $request)
    {
        return view('admin.add-entrepreneur-story');
    }

    public function StorySave(Request $request)
    {
        $data=[
            'name'         => $request->event_title,
            'description'  => $request->descrip,
        ];
        UpcomingEntrepreneurStory::create($data);
        return redirect()->route('admin.entrepreneur.story')->with('status', 'successfully Added Entrepreneurs Story');
    }

    public function EditStory(Request $request)
    {

        // dd($request->all());
        $event_dtl=UpcomingEntrepreneurStory::where('id',$request->id)->first();
        // dd($event_dtl);
        return view('admin.edit.edit-entrepreneur-story',compact('event_dtl'));
    }

    public function DeleteStory(Request $request)
    {
        // dd("delete");
        UpcomingEntrepreneurStory::where('id',$request->id)->delete();
        return redirect()->route('admin.entrepreneur.story')->with('status', 'successfully Deleted Entrepreneurs Story');
    }

    public function UpdateStory(Request $request)
    {
        dd($request->all());
    }

    public function UpdateEvent(Request $request)
    {
        dd($request->all());
    }
}
