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

    public function qualification(){
        return $this->hasOne("App\Models\admin\Qualification", 'id', 'app_qualification');

    }

    public function cast(){
        return $this->hasOne("App\Models\admin\Cast", 'id', 'category');

    }



}
