<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scheme extends Model
{
    use HasFactory;
    protected $fillable = [
        'scheme_name',
        'scheme_id'  ,
        'created_by'     ,
    ];
}
