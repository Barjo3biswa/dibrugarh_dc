<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_title',
        'role_id'  ,
        'created_by'     ,
    ];

    public function permission(){
        return $this->hasMany(role_permission::class, 'role_id', 'role_id');

    }
}
