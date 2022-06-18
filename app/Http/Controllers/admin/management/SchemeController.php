<?php

namespace App\Http\Controllers\admin\management;

use App\Http\Controllers\Controller;
use App\Models\admin\scheme;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    public function index()
    {
        // return view("admin\add-course");
        $route='admin.add_scheme';
        $btn_name="Add Scheme";
        $title="SCHEME";
        $subtitle="List Of All Scheme";
        $list_item=scheme::all();
        $tbody=[];
        $thead=['Sl','Scheme Name','Scheme Code','Action'];
        foreach($list_item as $key=>$list){
              $value=[
                ++$key, $list->scheme_name, $list->scheme_id,$list->id
              ];
              array_push($tbody,$value);
        }
        $editroute  ='admin.scheme.edit';
        $deleteroute='admin.scheme.delete';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute'));
        // return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle'));
    }

    public function Add()
    {
        return view("admin.add-scheme");
    }

    public function Save(Request $request){
        $id  = auth()->user()->id;
        $data=[
            'scheme_name' => $request->scheme_name,
            'scheme_id'   => $request->scheme_code,
            'created_by'  => $id
        ];
        // dd($data);
        scheme::create($data);
        return redirect()->route('admin.scheme')->with('status', 'successfully Added Scheme');
    }
    public function Delete(Request $request){
        scheme::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed Training');
    }

    public function Edit()
    {
        dd("wait");
    }
}
