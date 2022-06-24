<?php

namespace App\Http\Controllers\admin\management;

use App\Http\Controllers\Controller;
use App\Models\admin\Department;
use App\Models\sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $route='admin.add_sector';
        $btn_name="Add Sector";
        $title="SECTORS";
        $subtitle="List Of All Sectors";
        $thead=['Sl','Sector Name','Sector Code','Action'];
        $list_item=Sector::all();
        $tbody=[];
        foreach($list_item as $key=>$list){
            $value=[
              ++$key, $list->sector_name, $list->sector_id,$list->id
            ];
            array_push($tbody,$value);
        }
        $editroute  ='admin.sector.edit';
        $deleteroute='admin.sector.delete';
        return view("admin.show_for_all",compact('route','btn_name','thead','list_item','title','subtitle','tbody','editroute','deleteroute'));
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
        return redirect()->route('admin.sector')->with('status', 'successfully Added Department');
    }
    public function Delete(Request $request){
        sector::where('id',$request->id)->delete();
        return redirect()->back()->with('status', 'successfully Removed Sector');
    }

    public function Edit(Request $request)
    {
        $editable= sector::where('id',$request->id)->first();
        return view("admin.add-sector",compact('editable'));
        //dd("wait");
    }
}
