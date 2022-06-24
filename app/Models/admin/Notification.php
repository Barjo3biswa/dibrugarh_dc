<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function noticationtype(){
        return $this->hasOne(Notificationtype::class, 'id', 'type');

    }

    protected $fillable = [
            'title'        ,
            'description'  ,
            'notice_date'  ,
            'type'         ,
            'new_status'   ,
            'status'       ,
            'is_departmtnt',
            'created_by'   ,
            'attachments'  ,
    ];
}
