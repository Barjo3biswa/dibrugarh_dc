<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
    use HasFactory;

    public function department(){
        return $this->hasOne("App\Models\admin\Department", 'department_id', 'department_id');

    }

}
