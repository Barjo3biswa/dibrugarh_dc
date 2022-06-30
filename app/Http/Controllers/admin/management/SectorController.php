<?php

namespace App\Http\Controllers\admin\management;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\Department;
use App\Models\sector;
use App\Models\User;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // for permissions part here it is
        $id  = auth()->user()->id;
        $add   =Helper::CheckPermission($id,'Add Sector');
        $edit  =Helper::CheckPermission($id,'Edit Sector');
        $delete=Helper::CheckPermission($id,'Delete Sector');
        // permission ends
        $route='admin.add_sector';
        $btn_name="Add Sector";
        $title="SECTORS";
        $subtitle="List Of All Sectors";
        $thead=['Sl','Sector Name','Sector Code','Action'];
        $list_item=Sector::all();
        $tbody=[];
        foreach($list_item as $key=>$list){
            $value=[
              ++$key, $list->sector_name, $list->sector_id,$list->id,0,0 // hence checkbox & viewall is false so we pass this two zero
            ];
            array_push($tbody,$value);
        }
        $editroute  ='admin.sector.edit';
        $deleteroute='admin.sector.delete';
        $viewable='false'; //check compact or not
        $checkbox='false'; //check compact or not
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute','add','edit','delete','add','edit','delete'));
        // return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle'));
    }

    public function Add()
    {
        return view("admin.add-sector");
    }

    public function Save(Request $request){
        $id  = auth()->user()->id;
        $validated = $request->validate([
            'sector_id'      => 'required|max:20|unique:sectors,sector_id',
        ]);
        $data=[
            'sector_name' => $request->sector_name,
            'sector_id'   => $request->sector_id,
            'created_by'      => $id
        ];
        // dd($data);
        Sector::insert($data);
        return redirect()->route('admin.sector')->with('status', 'successfully Added Sector');
    }
    public function Delete(Request $request){
        sector::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed Sector');
    }

    public function Edit(Request $request)
    {
        $sector= sector::where('id',$request->id)->first();
        return view("admin.edit.edit-sector",compact('sector'));
        //dd("wait");
    }

    public function Update(Request $request)
    {
        $data=[
            'sector_name' => $request->sector_name,
        ];
        Sector::where('sector_id',$request->sector_id)->update($data);
        return redirect()->route('admin.sector')->with('status', 'successfully Updated Sector');
    }
}
