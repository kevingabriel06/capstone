<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ['updated_at', 'created_at'];

    protected $fillable = ['student_id', 'name', 'department', 'time_in', 'time_out'];
}
