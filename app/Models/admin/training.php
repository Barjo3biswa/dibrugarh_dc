<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_name',
        'training_id'  ,
        'course_id'    ,
        'department_code',
        'scheme_id'      ,
        'start_date'     ,
        'end_date'       ,
        'training_details',
        'created_by'      ,
        'place'           ,
        'contact_details' ,
        'attachments'     ,
        'registration_starts',
        'registration_ends',
    ];

    public function department(){
        return $this->hasOne("App\Models\admin\Department", 'department_id', 'department_code');

    }

    public function course(){
        return $this->hasOne("App\Models\admin\course", 'course_id', 'course_id');

    }

    public function scheme(){
        return $this->hasOne("App\Models\admin\scheme", 'scheme_id', 'scheme_id');

    }
}
