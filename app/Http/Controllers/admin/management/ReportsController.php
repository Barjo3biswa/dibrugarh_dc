<?php

namespace App\Http\Controllers\admin\management;

use App\Http\Controllers\Controller;
use App\Models\admin\job;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function EnquiryView(Request $request)
    {

        $messages=Enquiry::orderby('created_at','desc')->get();
        return view('admin.enquiry-view',compact('messages'));
        // dd($messages);
    }

    public function AllReadChangeStatus(Request $request)
    {
        $data=Enquiry::where('status',0)->update(['status'=>1]);
        return response()->json(array('success' => "successfull"));
    }

    public function NewNotification(Request $request)
    {
        $new_enquiry=Enquiry::where('status',0)->count();
        $new_job=job::where('status',0)->count();
        return response()->json(array('success' => "successfull",'new_enquiry'=>$new_enquiry,'new_job'=>$new_job));
    }
}
