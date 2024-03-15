<?php

namespace App\Models;
use App\Models\Attendance;

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
        "organization_id",
        "description",
        "image_path"
        
    ] ;

    protected $primaryKey = 'activity_id';

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
