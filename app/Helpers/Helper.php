<?php
namespace App\Helpers;

use App\Models\User;

class Helper{

    public static function CheckPermission($id,$permission)
    {
        $flag=0;
        $validate = User::with('permission')->where('id',$id)->first();
        foreach($validate->permission as $vali){
            if($vali->per_title==$permission){
               $flag=1;
               break;
            }
        }
        return $flag;
    }
}
