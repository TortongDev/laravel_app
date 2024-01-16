<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id','classroom_name','classroom_level_id','classroom_teacher_id','classroom_desc','classroom_status'
    ];
}
