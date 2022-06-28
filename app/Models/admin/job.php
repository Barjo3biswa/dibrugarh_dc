<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id'        ,
        'company_name'  ,
        'job_title'     ,
        'description'   ,
        'no_of_post'    ,
        'location'      ,
        'eligibility'   ,
        'experience'    ,
        'attachments'   ,
        'date'          ,
    ];


}
