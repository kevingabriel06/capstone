<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "date_start",
        "date_end",
        "start_time",
        "end_time",
        "registration_deadline",
        "registration_fee",
        "department_id",
        "description",
        "image",
    ] ;
}
