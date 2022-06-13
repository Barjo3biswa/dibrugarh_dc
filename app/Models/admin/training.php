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
        // 'attachments'     ,
    ];
}
